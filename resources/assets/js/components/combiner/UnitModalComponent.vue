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
                        <h5 class="m-0 py-2 d-block font-weight-bold" v-text="unit.description"></h5>
                    </div>
                </div>

                <div class="modal-body p-0">
                    <div v-show="formulas.length">
                        <p class="m-0 py-2">조합법</p>

                        <div class="border-top d-flex justify-content-center flex-wrap pt-3 pb-2">
                            <div class="text-center mx-2" v-for="formula in formulas">
                                <div style="cursor: pointer;" @click="refresh(formula[0])">
                                    <img class="img-fluid" :src="formula[0].imageUrl" alt="">
                                    <small class="d-block mt-1">
                                        {{ formula | nameWithCount }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-show="necessaries.length">
                        <p class="m-0 py-2 border-top">부족한 재료</p>

                        <div class="border-top d-flex justify-content-center flex-wrap pt-3 pb-2">
                            <div class="text-center mx-2" v-for="necessary in necessaries">
                                <div style="cursor: pointer;" @click="refresh(necessary[0])">
                                    <img class="img-fluid" :src="necessary[0].imageUrl" alt="">
                                    <small class="d-block mt-1">
                                        {{ necessary | nameWithCount }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-show="lowestNecessaries.length">
                        <p class="m-0 py-2 border-top">부족한 재료 (최하위)</p>

                        <div class="border-top d-flex justify-content-center flex-wrap pt-3 pb-2">
                            <div class="text-center mx-2" v-for="necessary in lowestNecessaries">
                                <div style="cursor: pointer;" @click="refresh(necessary[0])">
                                    <img class="img-fluid" :src="necessary[0].imageUrl" alt="">
                                    <small class="d-block mt-1">
                                        {{ necessary | nameWithCount }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-show="uppers.length">
                        <p class="m-0 py-2 border-top">상위 조합</p>

                        <div class="border-top d-flex justify-content-center flex-wrap pt-3 pb-2">
                            <div class="text-center mx-2" v-for="upper in uppers">
                                <div style="cursor: pointer;" @click="refresh(upper)">
                                    <img class="img-fluid" :src="upper.imageUrl" alt="">
                                    <small class="d-block mt-1" v-text="upper ? upper.getNameWithRate() : ''"></small>
                                </div>
                            </div>
                        </div>
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
                formulas: [],
                necessaries: [],
                lowestNecessaries: [],
                uppers: []
            };
        },

        mounted() {
            this.$root.$on('viewModal', unit => {
                $('#detailModal').modal('show');

                this.refresh(unit);
            });
        },

        filters: {
            nameWithCount(unit) {
                return unit[0].getNameWithRate() + (unit[1] > 1 ? ` x${unit[1]}` : '');
            }
        },

        methods: {
            refresh(unit) {
                this.unit = unit;
                this.formulas = unit.formulas;
                this.necessaries = unit.getNecessaries();
                this.lowestNecessaries = unit.getLowestNecessaries();
                this.uppers = unit.uppers;
            }
        },

        computed: {
            name() {
                return this.unit ? this.unit.getNameWithRate() : '';
            }
        }
    }
</script>
