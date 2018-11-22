<template>
    <div>
        <button class="btn btn-block m-1 white-text py-2 waves-effect waves-light" v-text="rate.name" :style="`background-color: ${rate.color};`" @click="show = ! show"></button>

        <div v-if="show" class="text-center">
            <formula-component v-for="formula in formulas"
                               :unit_id="unit_id"
                               :key="formula.id"
                               :formula="formula"
                               @set="fixed"
                               @edit="edited" />
        </div>
    </div>
</template>

<script>
    import FormulaComponent from './FormulaComponent';

    export default {
        props: ['unit_id', 'formulas', 'id'],

        components: { FormulaComponent },

        data() {
            return {
                show: false,
                rate: this.formulas[0].rate
            };
        },

        methods: {
            fixed(id) {
                this.$emit('fixed', id);
            },

            edited(id) {
                this.$emit('edited', id);
            }
        }
    }
</script>
