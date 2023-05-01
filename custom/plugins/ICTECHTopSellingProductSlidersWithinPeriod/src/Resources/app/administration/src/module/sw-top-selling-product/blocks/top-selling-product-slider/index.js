import './component';
import './preview';

/**
 * @private since v6.5.0
 * @package content
 */
Shopware.Service('cmsService').registerCmsBlock({
    name: 'top-selling-product-slider',
    label: 'sw-cms-top-selling-product-slider.blocks.commerce.topSellingProductSlider.label',
    category: 'commerce',
    component: 'sw-cms-block-top-selling-product-slider',
    previewComponent: 'sw-cms-preview-top-selling-product-slider',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed',
    },
    slots: {
        topSellingProductSlider: 'top-selling-product-slider',
    },
});
