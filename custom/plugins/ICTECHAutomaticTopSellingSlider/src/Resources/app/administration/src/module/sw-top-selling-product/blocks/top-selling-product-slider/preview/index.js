import template from './sw-cms-preview-top-selling-product-slider.html.twig';
import './sw-cms-preview-top-selling-product-slider.scss';

const { Component } = Shopware;

/**
 * @private since v6.5.0
 * @package content
 */
Component.register('sw-cms-preview-top-selling-product-slider', {
    template,
});