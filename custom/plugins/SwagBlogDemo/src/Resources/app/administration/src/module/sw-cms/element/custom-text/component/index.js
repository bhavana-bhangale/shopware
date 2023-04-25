import template from './sw-cms-el-custom-text.html.twig';
// import './sw-cms-el-custom-text.scss';

const { Component, Mixin } = Shopware;

/**
 * @private since v6.5.0
 * @package content
 */
Component.register('sw-cms-el-custom-text', {
    template,

    mixins: [
        Mixin.getByName('cms-element'),
    ],

    data() {
        return {
            editable: true,
            demoValue: '',
        };
    },

    watch: {
        cmsPageState: {
            deep: true,
            handler() {
                this.updateDemoValue();
            },
        },

        'element.config.customText.source': {
            handler() {
                this.updateDemoValue();
            },
        },
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('custom-text');
        },

        updateDemoValue() {
            if (this.element.config.customText.source === 'mapped') {
                this.demoValue = this.getDemoValue(this.element.config.customText.value);
            }
        },

        onBlur(content) {
            this.emitChanges(content);
        },

        onInput(content) {
            this.emitChanges(content);
        },

        emitChanges(content) {
            if (content !== this.element.config.customText.value) {
                this.element.config.customText.value = content;
                this.$emit('element-update', this.element);
            }
        },
    },
});
