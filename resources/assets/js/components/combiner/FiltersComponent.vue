<template>
    <div class="filters position-absolute">
        <i class="fa fa-check animated rotateIn" aria-hidden="true" v-for="include in includes" :style="`color: ${include.color};`"></i>
    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                unit: this.data,
                characteristics: [],
                includes: []
            };
        },

        mounted() {
            this.$root.$on('filter', characteristic => {
                this.characteristics.push(characteristic);

                this.filtering();
            });

            this.$root.$on('except', characteristic => {
                this.$delete(this.characteristics, this.characteristics.map(item => item.id).indexOf(characteristic.id));

                this.filtering();
            });

            this.$root.$on('disableFilter', () => {
                this.characteristics = [];
                this.includes = [];

                this.filtering();
            });
        },

        computed: {
            isShow() {
                return this.unit.lowest || this.unit.etc || this.unit.rate.name === '안흔함' || (! this.characteristics.length || this.characteristics.some(this.test));
            }
        },

        methods: {
            test(characteristic) {
                return new RegExp(characteristic.regexp).test(this.unit.description);
            },

            filtering() {
                this.includes = this.characteristics.filter(this.test);

                this.unit.show = this.isShow;
            }
        }
    }
</script>
