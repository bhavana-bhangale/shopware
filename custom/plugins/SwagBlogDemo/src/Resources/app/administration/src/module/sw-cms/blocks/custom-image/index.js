import CMS from '../../constant/sw-cms.constant';
import './component';
import './preview';

/**
 * @private since v6.5.0
 * @package content
 */
Shopware.Service('cmsService').registerCmsBlock({
    name: 'custom-image',
    label: 'sw-cms-custom-image.blocks.custom-image.image.label',
    category: 'image',
    component: 'sw-cms-block-custom-image',
    previewComponent: 'sw-cms-preview-custom-image',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed',
    },
    slots: {
        image: {
            type: 'custom-image',
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

    },
});
