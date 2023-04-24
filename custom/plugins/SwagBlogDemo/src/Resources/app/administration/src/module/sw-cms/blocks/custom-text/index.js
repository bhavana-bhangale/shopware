import './component';
import './preview';

/**
 * @private since v6.5.0
 * @package content
 */
Shopware.Service('cmsService').registerCmsBlock({
    name: 'custom-text',
    label: 'sw-cms.blocks.custom-text.text.label',
    category: 'text',
    component: 'sw-cms-block-custom-text',
    previewComponent: 'sw-cms-preview-custom-text',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed',
    },
    slots: {
        content: 'custom-text',
    },
});
