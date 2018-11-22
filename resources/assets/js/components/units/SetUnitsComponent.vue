<template>
    <draggable :data-rate-id="rateId" style="min-height: 40px;" :options="draggableOptions" @end="onEnd">
        <set-unit-component v-for="item in items" :data="item" :key="item.id" @destroy="deletes" />
    </draggable>
</template>

<script>
    import SetUnitComponent from './SetUnitComponent.vue';
    import collection from '../../mixins/collection.vue';

    export default {
        props: ['data', 'rateId'],

        components: { SetUnitComponent },

        mixins: [ collection ],

        data() {
            return {
                items: this.data
            };
        },

        mounted() {
            this.$root.$on('maked', ({unit}) => {
                if (unit.rate_id == this.rateId) this.items.push(unit);
            });
        },

        computed: {
            draggableOptions() {
                return {
                    item: '.draggable',
                    handle: '.handle'
                };
            }
        },

        methods: {
            onEnd(event) {
                let newIndex = event.newIndex;
                let newRateId = $(event.to).data('rate-id');

                if (event.oldIndex != newIndex || this.rateId != newRateId)
                    axios.put(`/admin/units/${$(event.item).data('id')}/order`, { rate_id: newRateId, order: newIndex });
            }
        }
    }
</script>
