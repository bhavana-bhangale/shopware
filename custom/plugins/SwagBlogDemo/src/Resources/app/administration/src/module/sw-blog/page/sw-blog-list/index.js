/*
 * @package inventory
 */

import template from './sw-blog-list.html.twig';

const { Component, Mixin } = Shopware;
const { Criteria } = Shopware.Data;

// eslint-disable-next-line sw-deprecation-rules/private-feature-declarations
Component.register('sw-blog-list', {
    template,

    inject: ['repositoryFactory', 'acl'],

    mixins: [
        Mixin.getByName('listing'),
    ],

    data() {
        return {
            blog: null,
            isLoading: true,
            sortBy: 'name',
            sortDirection: 'ASC',
            total: 0,
            searchConfigEntity: 'swag_blog',
        };
    },

    metaInfo() {
        return {
            title: this.$createTitle(),
        };
    },

    computed: {
        blogRepository() {
            return this.repositoryFactory.create('swag_blog_demo');
        },

        blogColumns() {
            return [{
                property: 'name',
                dataIndex: 'name',
                allowResize: true,
                routerLink: 'sw.blog.detail',
                label: 'sw-blog.list.columnName',
                inlineEdit: 'string',
                primary: true,
            }, {
                property: 'description',
                label: 'sw-blog.list.columnDescription',
                allowResize: true,
            }, {
                property: 'active',
                label: 'sw-blog.list.columnActive',
                inlineEdit: 'boolean',
                allowResize: true,
            }, {
                property: 'releaseDate',
                label:"sw-blog.list.columnReleaseDate",
                dateType: 'datetime-local',
                fromFieldLabel: null,
                toFieldLabel: null,
                showTimeframe: true,
            }, {
                property: 'author',
                label:"sw-blog.list.columnAuthor",
                routerLink: 'sw.blog.detail',
                inlineEdit: 'string',
                primary: true,

            },{
                property:'category',
                label:"sw-blog.list.columnCategory",
                routerLink: "sw.blog.detail",

            }
            ];
        },

        blogCriteria() {
            const blogCriteria = new Criteria(this.page, this.limit);

            blogCriteria.setTerm(this.term);
            blogCriteria.addSorting(Criteria.sort(this.sortBy, this.sortDirection, this.naturalSorting));

            return blogCriteria;
        },
    },

    methods: {
        onChangeLanguage(languageId) {
            this.getList(languageId);
        },

        async getList() {
            this.isLoading = true;

            const criteria = await this.addQueryScores(this.term, this.blogCriteria);

            if (!this.entitySearchable) {
                this.isLoading = false;
                this.total = 0;

                return false;
            }

            if (this.freshSearchTerm) {
                criteria.resetSorting();
            }

            return this.blogRepository.search(criteria)
                .then(searchResult => {
                    this.blog = searchResult;
                    this.total = searchResult.total;
                    this.isLoading = false;
                });
        },

        updateTotal({ total }) {
            this.total = total;
        },
    },
});
