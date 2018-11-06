<template>
    <draggable :data-column-id="columnId" style="min-height: 40px;" :options="draggableOptions" @end="onEnd">
        <set-rate-component v-for="rate in rates" :rate="rate" :key="rate.id" @destroy="deletes" />
    </draggable>
</template>

<script>
    import SetRateComponent from './SetRateComponent.vue';

    export default {
        props: ['data', 'columnId'],

        components: { SetRateComponent },

        data() {
            return {
                rates: this.data
            };
        },

        mounted() {
            this.$root.$on('maked', ({rate}) => {
                if (rate.column_id == this.columnId) this.rates.push(rate);
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
            deletes(id) {
                this.$delete(this.rates, this.rates.map(rate => rate.id).indexOf(id));
            },

            onEnd(event) {
                axios.put(`/admin/rates/${$(event.item).data('id')}/order`, { column_id: $(event.to).data('column-id'), order: event.newIndex });
            }
        }
    }
</script>
