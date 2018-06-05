<template>
    <div>
        <div class="namewrap d-flex position-relative align-items-center" @click.prevent="setCountByClick" v-on:contextmenu.prevent="build">
            <img class="img-fluid position-relative" :src="`/images/units/${unit.image}`" alt="">
            <div class="progress position-absolute w-100 h-100">
                <div class="progress-bar bg-info h-100" role="progressbar" :style="'width:' + unit.percent + '%;'" :aria-valuenow="unit.percent" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="name ml-1 position-relative" v-text="unit.output"></div>
        </div>

        <div class="d-flex align-items-center ml-1">
            <input class="count form-control py-0 px-1"
                   type="number"
                   min="0"
                   v-model="unit.count"
                   @keyup="setCountByKeyUp"
                   @focus="$event.target.select()"
                   v-on:contextmenu.prevent="toggleLock">

            <i class="detail fa fa-question-circle ml-2" aria-hidden="true"></i>
        </div>
    </div>
</template>

<script>
    import Unit from '../core/Unit.js';

    export default {
        props: ['data'],

        data() {
            return {
                unit: new Unit(this.data)
            };
        },

        created() {
            this.$emit('modify', this.unit);
        },

        methods: {
            setCountByClick(e) {
                if (e.shiftKey) {
                    if (this.unit.count > 0) {
                        this.unit.setCount(parseInt(this.unit.count) - 1);
                        refreshAll();
                    }
                } else {
                    this.unit.setCount(parseInt(this.unit.count) + 1);
                    refreshAll();
                }
            },

            setCountByKeyUp() {
                this.unit.setCount(this.unit.count);

                refreshAll();
            },

            toggleLock() {

            },

            build() {
                this.unit.canBuild();
            }
        }
    }
</script>
