<template>
    <div class="list-group-item d-flex align-items-center justify-content-between py-1 px-2" :data-id="Unit.id">
        <div class="namewrap d-flex" @click="click">
            <img class="img-fluid" :src="`/images/units/${Unit.image}`" alt="" style="width: 21px;">
            <div class="progress" :style="`width: ${percent} %;`"></div>
            <div class="name ml-1" v-text="Unit.name"></div>
        </div>

        <div class="d-flex align-items-center">
            <input class="count form-control py-0 px-1" type="number" min="0" style="width: 24px;" v-model="count">
            <i class="detail fa fa-question-circle ml-2" aria-hidden="true" style="font-size: 1.3rem;"></i>
        </div>

    </div>
</template>

<script>
    import Unit from '../core/Unit';

    export default {
        props: ['data'],

        data() {
            return {
                Unit: new Unit(this.data),
                count: 0,
                percent: 0
            };
        },

        methods: {
            click(e) {
                if (e.shiftKey) {
                    if (this.Unit.count > 0) {
                        this.Unit.SetCount(this.Unit.count - 1);
                    }
                } else {
                    this.Unit.SetCount(this.Unit.count + 1);
                }

                this.count = this.Unit.count;
                this.percent = this.Unit.percent;
                this.Unit.refreshAll();
            }
        }
    }
</script>
