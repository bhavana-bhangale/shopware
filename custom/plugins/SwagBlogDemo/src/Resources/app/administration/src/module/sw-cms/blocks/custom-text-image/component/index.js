import template from './sw-cms-block-custom-text-image.html.twig';
// import './sw-cms-block-image-text.scss';

const { Component } = Shopware;

/**
 * @private since v6.5.0
 * @package content
 */
Component.register('sw-cms-block-custom-text-image', {
    template,
});