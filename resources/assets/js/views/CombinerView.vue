<script>
    import RatesComponent from '../components/combiner/RatesComponent';
    import CharacteristicsComponent from '../components/combiner/CharacteristicsComponent';
    import UnitModalComponent from '../components/combiner/UnitModalComponent';

    export default {
        props: ['unitsCount'],

        components: { RatesComponent, CharacteristicsComponent, UnitModalComponent },

        data() {
            return {
                units: []
            };
        },

        mounted() {
            this.$root.$on('reset', () => {
                this.units.forEach(unit => unit.count = unit.defaultCount);

                this.refreshAll();
            });

            this.resizing();

            $(window).resize(this.resizing);
        },

        methods: {
            append(unit) {
                this.units.push(unit);

                if (this.unitsCount == this.units.length) this.init();
            },

            init() {
                this.units.forEach(unit =>
                    unit.setUppers(this.units)
                        .setFormulas(this.units)
                );

                // 하위 조합을 모두 구성해야 빌드 스코어 계산이 가능합니다.
                this.units.forEach(unit => unit.calculateBuildScore());

                this.refreshAll();
            },

            refreshAll() {
                this.units.forEach(unit => unit.refresh());
            },

            resizing() {
                $(this.$el).css({ 'min-height': window.innerHeight });
            }
        },

        created() {
            window.events.$on('refreshAll', () => this.refreshAll());
        }
    }
</script>
