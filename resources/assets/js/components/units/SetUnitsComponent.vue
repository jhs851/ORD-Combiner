<template>
    <draggable :data-rate-id="rate_id" style="min-height: 40px;" :options="draggableOptions" @end="onEnd">
        <set-unit-component v-for="item in items" :data="item" :key="item.id" @destroy="deletes" />
    </draggable>
</template>

<script>
    import SetUnitComponent from './SetUnitComponent.vue';
    import collection from '../../mixins/collection.vue';

    export default {
        props: ['data', 'rate_id'],

        components: { SetUnitComponent },

        mixins: [ collection ],

        data() {
            return {
                items: this.data,
                criteria: 'rate_id'
            };
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

                if (event.oldIndex != newIndex || this.rate_id != newRateId)
                    axios.put(`/admin/units/${$(event.item).data('id')}/order`, { rate_id: newRateId, order: newIndex });
            }
        }
    }
</script>
