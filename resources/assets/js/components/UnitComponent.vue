<template>
    <div class="list-group-item p-0" :class="{ 'burn': burn }" @mouseover="burn = true" @mouseout="burn = false" v-show="show">
        <div class="d-flex justify-content-between">
            <div class="unit d-flex position-relative align-items-center py-1 px-1 waves-effect waves-dark" @click.prevent="setCountByClick" @contextmenu.prevent="build">
                <div class="progress position-absolute h-100 py-1">
                    <div class="progress-bar h-100"
                         role="progressbar"
                         :style="progressStyles"
                         :aria-valuenow="unit.percent"
                         aria-valuemin="0"
                         aria-valuemax="100"></div>
                </div>

                <img class="img-fluid position-relative" :src="`/images/units/${unit.image}`" alt="">
                <div class="output ml-1 position-relative" v-html="unit.output"></div>
            </div>

            <div class="d-flex align-items-center py-1 pr-1">
                <button class="btn btn-default btn-sm d-md-none m-0 mr-2 py-1 px-2 z-depth-0" @click.prevent="build">조합</button>

                <input class="count form-control py-0 px-1"
                       type="number"
                       min="0"
                       v-model="unit.count"
                       @keyup="setCountByKeyUp"
                       @focus="$event.target.select()">

                <i class="fa fa-question-circle pl-2" aria-hidden="true" @click="showModal"></i>
            </div>
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
                burn: false,
                show: true
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
            }
        },

        mounted() {
            this.$root.$on('filter', includes => {
                if (! includes.length) {
                    return this.show = true;
                }

                this.show = this.unit.lowest || this.unit.rate.name == '안흔함' || includes.indexOf(this.unit.id) > -1;
            });
        },

        methods: {
            setCountByClick(e) {
                this.unit.setCount(parseInt(this.unit.count || 0) + (e.shiftKey && this.unit.count > 0 ?  -1 : 1));

                refreshAll();
            },

            setCountByKeyUp() {
                this.unit.setCount(parseInt(this.unit.count || 0));

                refreshAll();
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
