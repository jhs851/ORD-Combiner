<template>
    <div class="d-flex align-items-center">
        <set-formula-component v-for="formula in items" :key="formula.id" :data="formula" @destroy="deletes"></set-formula-component>

        <i class="fa fa-plus-circle fa-2x light-blue-text ml-2"
           aria-hidden="true"
           style="cursor: pointer;"
           @click="create"></i>
    </div>
</template>

<script>
    import SetFormulaComponent from './SetFormulaComponent.vue';
    import collection from '../../mixins/collection.vue';

    export default {
        props: ['data'],

        components: { SetFormulaComponent },

        mixins: [ collection ],

        data() {
            return {
                unit: this.data,
                items: this.data.formulas
            };
        },

        methods: {
            create() {
                axios.post('/admin/formulas', {'target_id': this.unit.id})
                     .then(({data}) => this.items.push(data.formula));
            }
        }
    }
</script>
