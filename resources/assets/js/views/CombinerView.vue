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
                this.units.forEach((unit, index, units) =>
                    unit.setUpperBuild(units)
                        .setFormulas(units)
                        .calculate()
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
