<template>
    <div class="list-group-item p-0" :class="{ 'burn': burn }" @mouseover="burn = true" @mouseout="burn = false" v-show="unit.show">
        <div class="d-flex justify-content-between">
            <div class="unit-wrap position-relative">
                <filters-component :data="unit"></filters-component>

                <progress-component :percent="unit.percent"></progress-component>

                <div class="unit d-flex align-items-center py-1 px-1 waves-effect waves-dark" @click.prevent="setCountByClick" @contextmenu.prevent="build">
                    <img class="img-fluid position-relative" :src="`/images/units/${unit.image}`" alt="">
                    <div class="output ml-1 position-relative" v-html="unit.output"></div>
                </div>
            </div>

            <div class="d-flex align-items-center py-1 pr-1">
                <button class="btn btn-default btn-sm d-md-none m-0 mr-2 py-1 px-2 z-depth-0" @click.prevent="decrement">-</button>

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
    import ProgressComponent from './ProgressComponent.vue';
    import FiltersComponent from './FiltersComponent.vue';

    export default {
        props: ['data'],

        components: { ProgressComponent, FiltersComponent },

        data() {
            return {
                unit: new Unit(this.data),
                burn: false
            };
        },

        created() {
            this.$emit('modify', this.unit);
        },

        methods: {
            setCountByClick(e) {
                this.unit.setCount(this.getCount() + (e.shiftKey && this.getCount() > 0 ?  -1 : 1));

                refreshAll();
            },

            setCountByKeyUp() {
                this.unit.setCount(this.getCount());

                refreshAll();
            },

            build() {
                this.unit.canBuild();
            },

            showModal() {
                this.$root.$emit('viewModal', this.unit);
            },

            decrement() {
                this.unit.setCount(this.getCount() - 1);

                refreshAll();
            },

            getCount() {
                return parseInt(this.unit.count || 0);
            }
        }
    }
</script>
