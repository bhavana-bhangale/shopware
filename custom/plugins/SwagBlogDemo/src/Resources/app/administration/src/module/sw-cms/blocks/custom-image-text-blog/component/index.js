import template from './sw-cms-block-custom-image-text-blog.html.twig';
// import './sw-cms-block-custom-image-text-blog.scss';

const { Component } = Shopware;

/**
 * @private since v6.5.0
 * @package content
 */
Component.register('sw-cms-block-custom-image-text-blog', {
    template,
});
