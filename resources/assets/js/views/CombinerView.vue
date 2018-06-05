<script>
    import RatesComponent from '../components/RatesComponent.vue';

    export default {
        props: ['unitsCount'],

        components: { RatesComponent },

        data() {
            return {
                units: []
            };
        },

        watch: {
            units() {
                if (this.unitsCount == this.units.length) {
                    this.init();
                }
            }
        },

        methods: {
            fetched(unit) {
                this.units.push(unit);
            },

            init() {
                this.units.forEach(unit =>
                    unit.setUpperBuild(this.units)
                        .setFormulas(this.units)
                );

                // 하위 조합을 모두 구성해야 빌드 스코어 계산이 가능합니다.
                this.units.forEach(unit =>
                    unit.calculateBuildScore()
                );
            },

            refreshAll() {
                this.units.forEach(unit => {
                    unit.refresh();
                });
            }
        },

        created() {
            window.events.$on('refreshAll', () => this.refreshAll());
        }
    }
</script>
