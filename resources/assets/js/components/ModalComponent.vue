<template>
    <div class="modal" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content p-2">

                <div class="modal-header p-0 d-block">
                    <div class="d-flex pb-2">
                        <p class="modal-title" id="detailModalLabel" v-text="name"></p>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="border-top" v-show="unit.description">
                        <small class="py-2 d-block" v-text="unit.description"></small>
                    </div>
                </div>

                <div class="modal-body p-0">
                    <div v-show="unit.formulas">
                        <p class="m-0 py-2">조합법</p>

                        <div class="border-top d-flex justify-content-center pt-3 pb-2">
                            <div class="text-center mx-2" v-for="formula in unit.formulas">
                                <img class="img-fluid" :src="'/images/units/' + formula[0].image" alt="" style="width: 40px;">
                                <small class="d-block mt-1">
                                    {{ formula | formulaName }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="m-0 py-2 border-top">부족한 재료</p>

                        <div class="border-top d-flex justify-content-center pt-3 pb-2"></div>
                    </div>

                    <div v-show="unit.upperBuild">
                        <p class="m-0 py-2 border-top">상위 조합</p>

                        <div class="border-top d-flex justify-content-center pt-3 pb-2">
                            <div class="text-center mx-2" v-for="upper in unit.upperBuild">
                                <img class="img-fluid" :src="'/images/units/' + upper.image" alt="" style="width: 40px;">
                                <small class="d-block mt-1" v-text="upper ? upper.getName() : ''"></small>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="m-0 py-2 border-top">최상위 조합</p>

                        <div class="border-top d-flex justify-content-center pt-3 pb-2"></div>
                    </div>

                    <div>
                        <p class="m-0 py-2 border-top">최하위 재료</p>

                        <div class="border-top d-flex justify-content-center pt-3 pb-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                unit: false,
                scarce: []
            };
        },

        mounted() {
            this.$root.$on('viewModal', unit => {
                $('#detailModal').modal('show');

                this.unit = unit;
            });
        },

        filters: {
            formulaName(formula) {
                return formula[0].getName() + (formula[1] > 1 ? ` x${formula[1]}` : '');
            }
        },

        computed: {
            name() {
                return this.unit ? this.unit.getName() : '';
            }
        }
    }
</script>

<style scoped>

</style>
