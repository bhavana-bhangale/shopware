/*
 * @package inventory
 */

import './page/sw-blog-list';
import './page/sw-blog-detail';
import './acl';
// import defaultSearchConfiguration from './default-search-configuration';

const { Module } = Shopware;

// eslint-disable-next-line sw-deprecation-rules/private-feature-declarations
Module.register('sw-blog', {
    type: 'core',
    name: 'blog',
    title: 'sw-blog.general.mainMenuItemGeneral',
    description: 'sw-blog.general.mainMenuItemDescription',
    version: '1.0.0',
    targetVersion: '1.0.0',
    color: '#57D9A3',
    icon: 'regular-products',
    favicon: 'icon-module-products.png',
    entity: 'swag_blog_demo',

    routes: {
        index: {
            components: {
                default: 'sw-blog-list',
            },
            path: 'index',
            meta: {
                privilege: 'blog.viewer',
            },
        },
        create: {
            component: 'sw-blog-detail',
            path: 'create',
            meta: {
                parentPath: 'sw.blog.index',
                privilege: 'blog.creator',
            },
        },
        detail: {
            component: 'sw-blog-detail',
            path: 'detail/:id',
            meta: {
                parentPath: 'sw.blog.index',
                privilege: 'blog.viewer',
            },
            props: {
                default(route) {
                    return {
                        blogId: route.params.id,
                    };
                },
            },
        },
    },

    navigation: [{
        path: 'sw.blog.index',
        privilege: 'blog.viewer',
        label: 'sw-blog.general.mainMenuItemList',
        id: 'sw-blog',
        parent: 'sw-catalogue',
        color: '#57D9A3',
        position: 52,
    }],

    // defaultSearchConfiguration,
});
