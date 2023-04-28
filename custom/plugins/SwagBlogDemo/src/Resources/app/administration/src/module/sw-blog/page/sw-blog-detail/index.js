import template from './sw-blog-detail.html.twig';
const { EntityCollection, Criteria } = Shopware.Data;

// import './sw-blog-detail.scss';
const { Component, Mixin, Data: { Criteria } } = Shopware;

const { mapPropertyErrors } = Shopware.Component.getComponentHelper();

// eslint-disable-next-line sw-deprecation-rules/private-feature-declarations
Component.register('sw-blog-detail', {
    template,

    inject: ['repositoryFactory', 'acl'],

    mixins: [
        Mixin.getByName('placeholder'),
        Mixin.getByName('notification'),
        Mixin.getByName('discard-detail-page-changes')('blog'),
    ],

    shortcuts: {
        'SYSTEMKEY+S': 'onSave',
        ESCAPE: 'onCancel',
    },

    props: {
        blogId: {
            type: String,
            required: false,
            default: null,
        },
    },


    data() {
        return {
            blog: null,
            customFieldSets: [],
            isLoading: false,
            isSaveSuccessful: false,
            billingProducts: null,
            inputKey: 'productIds',
        };
    },

    metaInfo() {
        return {
            title: this.$createTitle(this.identifier),
        };
    },

    computed: {
        identifier() {
            return this.placeholder(this.blog, 'name');
        },
        productIds: {
            get() {
                return this.blog.productIds || [];
            },
            set(productIds) {
                this.blog.value = { ...this.blog.products, productIds };
            },
        },

        blogIsLoading() {
            return this.isLoading || this.blog == null;
        },

        blogRepository() {
            return this.repositoryFactory.create('swag_blog_demo');
        },

        // mediaRepository() {
        //     return this.repositoryFactory.create('media');
        // },
        //
        // customFieldSetRepository() {
        //     return this.repositoryFactory.create('custom_field_set');
        // },

        // customFieldSetCriteria() {
        //     const criteria = new Criteria(1, null);
        //     criteria.addFilter(
        //         Criteria.equals('relations.entityName', 'swag_blog_demo'),
        //     );
        //
        //     return criteria;
        // },

        // mediaUploadTag() {
        //     return `sw-manufacturer-detail--${this.manufacturer.id}`;
        // },

        tooltipSave() {
            if (this.acl.can('blog.editor')) {
                const systemKey = this.$device.getSystemKey();

                return {
                    message: `${systemKey} + S`,
                    appearance: 'light',
                };
            }

            return {
                showDelay: 300,
                message: this.$tc('sw-privileges.tooltip.warning'),
                disabled: this.acl.can('order.editor'),
                showOnDisabledElements: true,
            };
        },

        tooltipCancel() {
            return {
                message: 'ESC',
                appearance: 'light',
            };
        },

        ...mapPropertyErrors('blog', ['name']),
    },

    watch: {
        blogId() {
            this.createdComponent();
        },
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.billingProducts = new EntityCollection(
                this.productRepository.route,
                this.productRepository.entityName,
            );
            Shopware.ExtensionAPI.publishData({
                id: 'sw-blog-detail__blog',
                path: 'blog',
                scope: this,
            });
            if (this.blogId) {
                this.loadEntityData();
                return;
            }

            Shopware.State.commit('context/resetLanguageToDefault');
            this.blog = this.blogRepository.create();
        },

        async loadEntityData() {
            this.isLoading = true;

            const [blogResponse, customFieldResponse] = await Promise.allSettled([
                this.blogRepository.get(this.blogId),
                this.customFieldSetRepository.search(this.customFieldSetCriteria),
            ]);

            if (blogResponse.status === 'fulfilled') {
                this.blog = blogResponse.value;
            }

            if (customFieldResponse.status === 'fulfilled') {
                this.customFieldSets = customFieldResponse.value;
            }

            if (blogResponse.status === 'rejected' || customFieldResponse.status === 'rejected') {
                this.createNotificationError({
                    message: this.$tc(
                        'global.notification.notificationLoadingDataErrorMessage',
                    ),
                });
            }

            this.isLoading = false;
        },

        abortOnLanguageChange() {
            return this.blogRepository.hasChanges(this.blog);
        },

        saveOnLanguageChange() {
            return this.onSave();
        },

        onChangeLanguage() {
            this.loadEntityData();
        },

        // setMediaItem({ targetId }) {
        //     this.manufacturer.mediaId = targetId;
        // },
        //
        // setMediaFromSidebar(media) {
        //     this.manufacturer.mediaId = media.id;
        // },
        //
        // onUnlinkLogo() {
        //     this.manufacturer.mediaId = null;
        // },
        //
        // openMediaSidebar() {
        //     this.$refs.mediaSidebarItem.openContent();
        // },
        //
        // onDropMedia(dragData) {
        //     this.setMediaItem({ targetId: dragData.id });
        // },

        onSave() {
            if (!this.acl.can('blog.editor')) {
                return;
            }

            this.isLoading = true;

            this.blogRepository.save(this.blog).then(() => {
                this.isLoading = false;
                this.isSaveSuccessful = true;
                if (this.blogId === null) {
                    this.$router.push({ name: 'sw.blog.detail', params: { id: this.blog.id } });
                    return;
                }

                this.loadEntityData();
            }).catch((exception) => {
                this.isLoading = false;
                this.createNotificationError({
                    message: this.$tc(
                        'global.notification.notificationSaveErrorMessageRequiredFieldsInvalid',
                    ),
                });
                throw exception;
            });
        },

        onCancel() {
            this.$router.push({ name: 'sw.blog.index' });
        },
        setProductIds(products) {
            this.productIds = products.getIds();
            this.billingProducts = products;
            this.blog.products = products;

        },
    },
});
