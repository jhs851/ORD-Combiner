<template>
    <div class="filters position-absolute">
        <i class="fa fa-check animated rotateIn" aria-hidden="true" v-for="characteristic in includeCharacteristics" :style="`color: ${characteristic.color};`"></i>
    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                unit: this.data,
                characteristics: [],
                included: [],
                includeCharacteristics: []
            };
        },

        mounted() {
            this.$root.$on('filter', characteristic => {
                if (characteristic) {
                    this.characteristics.push(characteristic);
                } else {
                    this.characteristics = [];
                }

                this.filtering();
            });

            this.$root.$on('except', characteristic => {
                this.characteristics.splice(this.characteristics.indexOf(characteristic), 1);

                this.filtering();
            });
        },

        methods: {
            filtering() {
                this.included = [];
                this.includeCharacteristics = [];

                if (! this.characteristics.length) {
                    return this.unit.show = true;
                }

                this.characteristics.forEach(characteristic => {
                    this.included = characteristic.included.concat(this.included);

                    if (characteristic.included.indexOf(this.unit.id) > -1) {
                        this.includeCharacteristics.push(characteristic);
                    }
                });

                this.unit.show = this.unit.lowest || this.unit.etc || this.unit.rate.name == '안흔함' || this.included.indexOf(this.unit.id) > -1
            }
        }
    }
</script>
