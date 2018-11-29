<template>
    <draggable :data-column-id="column_id" style="min-height: 40px;" :options="draggableOptions" @end="onEnd">
        <set-rate-component v-for="item in items" :rate="item" :key="item.id" @destroy="deletes" />
    </draggable>
</template>

<script>
    import SetRateComponent from './SetRateComponent.vue';
    import collection from '../../mixins/collection.vue';

    export default {
        props: ['data', 'column_id'],

        components: { SetRateComponent },

        mixins: [ collection ],

        data() {
            return {
                items: this.data,
                criteria: 'column_id'
            };
        },

        computed: {
            draggableOptions() {
                return {
                    group: 'rates',
                    item: '.draggable',
                    handle: '.handle'
                };
            }
        },

        methods: {
            onEnd(event) {
                let newIndex = event.newIndex;
                let newColumnId = $(event.to).data('column-id');

                if (event.oldIndex != newIndex || this.column_id != newColumnId)
                    axios.put(`/admin/rates/${$(event.item).data('id')}/order`, { column_id: newColumnId, order: newIndex });
            }
        }
    }
</script>
