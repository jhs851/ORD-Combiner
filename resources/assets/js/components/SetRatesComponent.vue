<template>
    <draggable :data-column-id="columnId" style="min-height: 40px;" :options="draggableOptions" @end="onEnd">
        <set-rate-component v-for="item in items" :rate="item" :key="item.id" @destroy="deletes" />
    </draggable>
</template>

<script>
    import SetRateComponent from './SetRateComponent.vue';
    import collection from '../mixins/collection.vue';

    export default {
        props: ['data', 'columnId'],

        components: { SetRateComponent },

        mixins: [ collection ],

        data() {
            return {
                items: this.data
            };
        },

        mounted() {
            this.$root.$on('maked', ({rate}) => {
                if (rate.column_id == this.columnId) this.items.push(rate);
            });
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

                if (event.oldIndex != newIndex || this.columnId != newColumnId)
                    axios.put(`/admin/rates/${$(event.item).data('id')}/order`, { column_id: newColumnId, order: newIndex });
            }
        }
    }
</script>
