/*
 * @package inventory
 */

import template from './sw-blog-category-detail.html.twig';


const { Component, Mixin, Data: { Criteria } } = Shopware;
//
const { mapPropertyErrors } = Shopware.Component.getComponentHelper();
//
// eslint-disable-next-line sw-deprecation-rules/private-feature-declarations
Component.register('sw-blog-category-detail', {
    template,
    inject: ['repositoryFactory', 'acl'],

    mixins: [
        Mixin.getByName('placeholder'),
        Mixin.getByName('notification'),
        Mixin.getByName('discard-detail-page-changes')('blogCategory'),
    ],

    shortcuts: {
        'SYSTEMKEY+S': 'onSave',
        ESCAPE: 'onCancel',
    },

    props: {
        blogCategoryId: {
            type: String,
            required: false,
            default: null,
        },
    },


    data() {
        return {
            blogCategory: null,
            customFieldSets: [],
            isLoading: false,
            isSaveSuccessful: false,
        };
    },

    metaInfo() {
        return {
            title: this.$createTitle(this.identifier),
        };
    },

    computed: {
        identifier() {
            return this.placeholder(this.blogCategory, 'name');
        },

        blogCategoryIsLoading() {
            return this.isLoading || this.blogCategory == null;
        },

        blogCategoryRepository() {
            return this.repositoryFactory.create('swag_blog_category');
        },

        tooltipSave() {
            if (this.acl.can('swag_blog_category.editor')) {
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

        ...mapPropertyErrors('blogCategory', ['name']),
    },

    watch: {
        blogCategoryId() {
            this.createdComponent();
        },
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            Shopware.ExtensionAPI.publishData({
                id: 'sw-blog-category-detail__blogCategory',
                path: 'blog.category',
                scope: this,
            });
            if (this.blogCategoryId) {
                this.loadEntityData();
                return;
            }

            Shopware.State.commit('context/resetLanguageToDefault');
            this.manufacturer = this.blogCategoryRepository.create();
        },

        async loadEntityData() {
            this.isLoading = true;

            const [blogCategoryResponse, customFieldResponse] = await Promise.allSettled([
                this.blogCategoryRepository.get(this.blogCategoryId),
                this.customFieldSetRepository.search(this.customFieldSetCriteria),
            ]);

            if (blogCategoryResponse.status === 'fulfilled') {
                this.manufacturer = blogCategoryResponse.value;
            }

            if (customFieldResponse.status === 'fulfilled') {
                this.customFieldSets = customFieldResponse.value;
            }

            if (blogCategoryResponse.status === 'rejected' || customFieldResponse.status === 'rejected') {
                this.createNotificationError({
                    message: this.$tc(
                        'global.notification.notificationLoadingDataErrorMessage',
                    ),
                });
            }

            this.isLoading = false;
        },

        abortOnLanguageChange() {
            return this.blogCategoryRepository.hasChanges(this.blogCategory);
        },

        saveOnLanguageChange() {
            return this.onSave();
        },

        onChangeLanguage() {
            this.loadEntityData();
        },

        onSave() {
            if (!this.acl.can('swag_blog_category.editor')) {
                return;
            }

            this.isLoading = true;

            this.blogCategoryRepository.save(this.blogCategory).then(() => {
                this.isLoading = false;
                this.isSaveSuccessful = true;
                if (this.blogCategoryId === null) {
                    this.$router.push({ name: 'sw.blog.category.detail', params: { id: this.blogCategory.id } });
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
            this.$router.push({ name: 'sw.blog.category.index' });
        },
    },
});
