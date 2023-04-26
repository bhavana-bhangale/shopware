import template from './sw-cms-preview-custom-image.html.twig';
// import './sw-cms-preview-custom-image.scss';

const { Component } = Shopware;

/**
 * @private since v6.5.0
 * @package content
 */
Component.register('sw-cms-preview-custom-image', {
    template,
});
