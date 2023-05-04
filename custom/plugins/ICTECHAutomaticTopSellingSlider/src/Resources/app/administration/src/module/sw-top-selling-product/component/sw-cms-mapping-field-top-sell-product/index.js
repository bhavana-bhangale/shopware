import template from './sw-cms-mapping-field-top-sell-product.html.twig';
import './sw-cms-mapping-field-top-sell-product.scss';

const { Component } = Shopware;

/**
 * @private since v6.5.0
 * @package content
 */
Component.register('sw-cms-mapping-field-top-sell-product', {
    template,

    inject: ['cmsService'],

    model: {
        prop: 'config',
        event: 'config-update',
    },

    props: {
        config: {
            type: Object,
            required: true,
            default() {
                return {
                    source: 'static',
                    value: null,
                };
            },
        },

        valueTypes: {
            type: [String, Array],
            required: false,
            default: 'string',
        },

        entity: {
            type: String,
            required: false,
            default: null,
        },

        label: {
            type: String,
            required: false,
            default: '',
        },
    },

    data() {
        return {
            cmsPageState: Shopware.State.get('cmsPageState'),
            mappingTypes: {},
            allowedMappingTypesCategory: ['category.id'],
            demoValue: null,
        };
    },

    computed: {
        isMapped() {
            return this.config.source === 'mapped';
        },

        hasPreview() {
            return typeof this.$scopedSlots.preview !== 'undefined';
        },
    },

    watch: {
        cmsPageState: {
            deep: true,
            handler() {
                this.updateMappingTypes();
                this.updateDemoValue();
            },
        },
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.updateMappingTypes();
            this.updateDemoValue();
        },

        updateMappingTypes() {
            this.mappingTypes = this.cmsPageState.currentMappingTypes;

            this.getAllowedMappingTypes();

            if (this.config.source === 'mapped') {
                const mappingPath = this.config.value.split('.');

                if (mappingPath[0] !== this.cmsPageState.currentMappingEntity) {
                    this.onMappingRemove();
                }
            }
        },

        updateDemoValue() {
            if (this.config.source === 'mapped') {
                this.demoValue = this.getDemoValue(this.config.value);
            }
        },

        onMappingSelect(property) {
            this.config.source = 'mapped';
            this.config.value = property;
            this.demoValue = this.getDemoValue(property);
        },

        onMappingRemove() {
            this.config.source = 'static';
            this.config.value = this.config.type === Array ? [] : null;
            this.demoValue = null;
        },

        getAllowedMappingTypes() {
            let types = [];

            if (this.valueTypes === 'entity') {
                if (this.entity !== null &&
                    this.mappingTypes.entity &&
                    this.mappingTypes.entity[this.entity]) {
                    types = this.mappingTypes.entity[this.entity];
                }
            } else {
                Object.keys(this.mappingTypes).forEach((type) => {
                    if (type === this.valueTypes || this.valueTypes.includes(type)) {
                        types = [...types, ...this.mappingTypes[type]];
                        types.sort();
                    }
                });
            }
            console.log(types)
            this.allowedMappingTypes = types;
        },

        getDemoValue(mappingPath) {
            return this.cmsService.getPropertyByMappingPath(
                this.cmsPageState.currentDemoEntity,
                mappingPath,
            );
        },
    },
});