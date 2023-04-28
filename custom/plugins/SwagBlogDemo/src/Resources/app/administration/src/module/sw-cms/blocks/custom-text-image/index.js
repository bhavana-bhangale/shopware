import CMS from '../../constant/sw-cms.constant';
import './component';
import './preview';

/**
 * @private since v6.5.0
 * @package content
 */
Shopware.Service('cmsService').registerCmsBlock({
    name: 'custom-text-image',
    label: 'sw-cms-custom-text-image.blocks.custom-text-image.text.label',
    category: 'text-image',
    component: 'sw-cms-block-custom-text-image',
    previewComponent: 'sw-cms-preview-custom-text-image',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed',
    },
    slots: {
        customImage: {
            type: 'image',
            default: {
                config: {
                    displayMode: { source: 'static', value: 'standard' },
                },
                data: {
                    media: {
                        value: CMS.MEDIA.previewMountain,
                        source: 'default',
                    },
                },
            },
        },
        customText: 'custom-text',
    },
});
