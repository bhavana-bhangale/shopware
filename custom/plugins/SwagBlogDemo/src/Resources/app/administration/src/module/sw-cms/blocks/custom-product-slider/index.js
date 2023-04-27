import './component';
import './preview';

/**
 * @private since v6.5.0
 * @package content
 */
Shopware.Service('cmsService').registerCmsBlock({
    name: 'custom-product-slider',
    label: 'sw-cms-custom-product-slider.blocks.commerce.productSlider.label',
    category: 'commerce',
    component: 'sw-cms-block-custom-product-slider',
    previewComponent: 'sw-cms-preview-custom-product-slider',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed',
    },
    slots: {
        productSlider: 'custom-product-slider',
    },
});
