import './component';
import './config';
import './preview';

const Criteria = Shopware.Data.Criteria;
const criteria = new Criteria(1, 25);
criteria.addAssociation('cover');

/**
 * @private since v6.5.0
 * @package content
 */
Shopware.Service('cmsService').registerCmsElement({
    name: 'top-selling-product-slider',
    label: 'sw-cms-top-selling-product-slider.elements.topSellingProductSlider.label',
    component: 'sw-cms-el-top-selling-product-slider',
    configComponent: 'sw-cms-el-config-top-selling-product-slider',
    previewComponent: 'sw-cms-el-preview-top-selling-product-slider',
    defaultConfig: {
        // products: {
        //     source: 'static',
        //     value: [],
        //     required: true,
        //     entity: {
        //         name: 'product',
        //         criteria: criteria,
        //     },
        // },
        content: {
            source: 'static',
            value: null
        },
        title: {
            source: 'static',
            value: '',
        },
        displayMode: {
            source: 'static',
            value: 'standard',
        },
        boxLayout: {
            source: 'static',
            value: 'standard',
        },
        navigation: {
            source: 'static',
            value: true,
        },
        rotate: {
            source: 'static',
            value: false,
        },
        border: {
            source: 'static',
            value: false,
        },
        elMinWidth: {
            source: 'static',
            value: '300px',
        },
        verticalAlign: {
            source: 'static',
            value: null,
        },
        bestSellProductDay: {
            source: 'static',
            value: null,
        },
        bestSellProductMultiple: {
            source: 'static',
            value: null,
        },

    },
    collect: Shopware.Service('cmsService').getCollectFunction(),
});
