<template>
    <div>
        <div class="namewrap d-flex" @click.prevent="click" v-on:contextmenu.prevent="rightClick">
            <img class="img-fluid" :src="`/images/units/${unit.image}`" alt="" style="width: 21px;">
            <div class="progress"></div>
            <div class="name ml-1" v-text="unit.name"></div>
        </div>

        <div class="d-flex align-items-center">
            <input class="count form-control py-0 px-1" type="number" min="0" style="width: 24px;" v-model="unit.count">
            <i class="detail fa fa-question-circle ml-2" aria-hidden="true" style="font-size: 1.3rem;"></i>
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
            click(e) {
                if (e.shiftKey) {
                    if (this.unit.count > 0) {
                        this.unit.setCount(this.unit.count - 1);
                        refreshAll();
                    }
                } else {
                    this.unit.setCount(this.unit.count + 1);
                    refreshAll();
                }
            },

            rightClick() {
                this.unit.canBuild();
            }
        }
    }
</script>
