/*
 * @package inventory
 */

import './page/sw-blog-list';
import './page/sw-blog-detail';
import './acl';
import defaultSearchConfiguration from './default-search-configuration';

const { Module } = Shopware;

// eslint-disable-next-line sw-deprecation-rules/private-feature-declarations
Module.register('sw-blog', {
    type: 'core',
    name: 'blog',
    title: 'sw-blog.general.mainMenuItemGeneral',
    description: 'Manages the manufacturer of the application',
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
                privilege: 'product_manufacturer.viewer',
            },
        },
        create: {
            component: 'sw-blog-detail',
            path: 'create',
            meta: {
                parentPath: 'sw.manufacturer.index',
                privilege: 'product_manufacturer.creator',
            },
        },
        detail: {
            component: 'sw-blog-detail',
            path: 'detail/:id',
            meta: {
                parentPath: 'sw.manufacturer.index',
                privilege: 'product_manufacturer.viewer',
            },
            props: {
                default(route) {
                    return {
                        manufacturerId: route.params.id,
                    };
                },
            },
        },
    },

    navigation: [{
        path: 'sw.manufacturer.index',
        privilege: 'product_manufacturer.viewer',
        label: 'sw-manufacturer.general.mainMenuItemList',
        id: 'sw-manufacturer',
        parent: 'sw-catalogue',
        color: '#57D9A3',
        position: 50,
    }],

    defaultSearchConfiguration,
});
