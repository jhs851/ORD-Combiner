<template>
    <div class="position-relative">
        <div class="formula text-center mx-1" v-popover.bottom="{ name: `popover-${formula.id}` }">
            <img :src="formula.unit.imageUrl" alt="" style="width: 40px; height: 40px; cursor:pointer;"><br>
            <span v-html="name"></span>
        </div>

        <popover :name="`popover-${formula.id}`" :width="300" @show="flush" ref="popover">
            <div class="popover-header p-1">
                <div class="form-inline justify-content-between">
                    <div class="input-group w-50">
                        <input type="number" min="1" step="1" v-model="count" class="form-control mw-100">
                    </div>

                    <div>
                        <button class="btn btn-sm btn-floating p-0 m-0 btn-primary" @click="update(null)">
                            <i class="fa fa-upload" aria-hidden="true"></i>
                        </button>

                        <button class="btn btn-sm btn-floating p-0 m-0 mx-1 btn-danger" @click="destroy">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>

                        <button class="btn btn-sm btn-floating p-0 m-0 btn-warning" @click="close">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="popover-body p-1">
                <formulas-component v-for="(formulas, key) in possibleFormulasOfRates"
                                :unit_id="unit_id"
                                :key="key"
                                :id="key"
                                :formulas="formulas"
                                @fixed="setUnitId"
                                @edited="update" />
            </div>
        </popover>
    </div>
</template>

<script>
    import FormulasComponent from './FormulasComponent';

    export default {
        props: ['data'],

        components: { FormulasComponent },

        data() {
            return {
                formula: this.data,
                possibleFormulasOfRates: [],
                count: this.data.count,
                unit_id: null
            };
        },

        computed: {
            name() {
                return this.formula.unit.name + `<small>(${this.formula.unit.rate.name})</small>` + (this.formula.count > 1 ? 'x' + this.formula.count : '');
            }
        },

        methods: {
            flush() {
                axios.get(`/api/admin/formulas/${this.formula.target_id}`).then(({data}) => this.possibleFormulasOfRates = data);
            },

            update(id) {
                if (! this.unit_id && id) return toastr.error('변경할 유닛을 선택해주세요.');

                axios.put(`/admin/formulas/${this.formula.id}`, { unit_id: id || this.unit_id, count: this.count })
                     .then(({data}) => {
                         this.formula = data.formula;
                         this.unit_id = null;
                         this.flush();
                     });
            },

            destroy() {
                if (confirm('정말 삭제하시겠습니까?')) {
                    axios.delete(`/admin/formulas/${this.formula.id}`)
                        .then(() => this.$emit('destroy', this.formula.id));
                }
            },

            close() {
                this.$refs.popover.visible = false;
                this.count = this.data.count;
                this.possibleFormulasOfRates = [];
                this.unit_id = null;
            },

            setUnitId(id) {
                this.unit_id = id;
            }
        }
    }
</script>

<style lang="scss">
    .dropdown-position-bottom {
        left: -125px !important;
        top: 104% !important;
    }
</style>
