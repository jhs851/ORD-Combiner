<template>
    <div :class="{ 'burn': burn }" @mouseover="burn = true" @mouseout="burn = false">
        <div class="unit d-flex position-relative align-items-center" @click.prevent="setCountByClick" @contextmenu.prevent="build">
            <div class="progress position-absolute w-100 h-100">
                <div class="progress-bar h-100"
                     role="progressbar"
                     :style="progressStyles"
                     :aria-valuenow="unit.percent"
                     aria-valuemin="0"
                     aria-valuemax="100"></div>
            </div>

            <img class="img-fluid position-relative" :src="`/images/units/${unit.image}`" alt="">
            <div class="output ml-1 position-relative" v-text="unit.output"></div>
        </div>

        <div class="d-flex align-items-center ml-1">
            <input :class="countClasses"
                   type="number"
                   min="0"
                   v-model="unit.count"
                   @keyup="setCountByKeyUp"
                   @focus="$event.target.select()"
                   @contextmenu.prevent="toggleLock">

            <i class="fa fa-question-circle pl-2" aria-hidden="true" @click="showModal"></i>
        </div>
    </div>
</template>

<script>
    import Unit from '../core/Unit.js';

    export default {
        props: ['data'],

        data() {
            return {
                unit: new Unit(this.data),
                burn: false
            };
        },

        created() {
            this.$emit('modify', this.unit);
        },

        computed: {
            progressStyles() {
                return {
                    width: this.unit.percent + '%',
                    backgroundColor: this.unit.percent == 100 ? '#76ff03' : '#bbdefb'
                }
            },

            countClasses() {
                return ['count', 'form-control', 'py-0', 'px-1', this.unit.lock ? 'bg-warning' : ''];
            }
        },

        methods: {
            setCountByClick(e) {
                if (e.shiftKey) {
                    if (this.unit.count > 0) {
                        this.unit.setCount(parseInt(this.unit.count || 0) - 1);
                    }
                } else {
                    this.unit.setCount(parseInt(this.unit.count || 0) + 1);
                }

                refreshAll();
            },

            setCountByKeyUp() {
                this.unit.setCount(this.unit.count);

                refreshAll();
            },

            toggleLock() {
                // let idx = window.LOCK_UNITS.indexOf(this.unit);
                //
                // if (idx != -1) {
                //     window.LOCK_UNITS[idx] = null;
                // } else {
                //     let added = false;
                //
                //     for (let i = 0; i < window.LOCK_UNITS.length; i++) {
                //         if (! window.LOCK_UNITS[i]) {
                //             window.LOCK_UNITS[i] = this.unit;
                //             added = true;
                //             break;
                //         }
                //     }
                //
                //     if (! added) {
                //         window.LOCK_UNITS.push(this.unit);
                //     }
                // }
                //
                // refreshAll();

                // this.unit.lock = ! this.unit.lock;
            },

            build() {
                this.unit.canBuild();
            },

            showModal() {
                this.$root.$emit('viewModal', this.unit);
            }
        }
    }
</script>
