import template from './sw-cms-block-custom-text.html.twig';

const { Component } = Shopware;

/**
 * @private since v6.5.0
 * @package content
 */
Component.register('sw-cms-block-custom-text', {
    template,
});
