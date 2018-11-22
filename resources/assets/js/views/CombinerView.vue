<script>
    import RatesComponent from '../components/combiner/RatesComponent';
    import CharacteristicsComponent from '../components/combiner/CharacteristicsComponent';
    import ModalComponent from '../components/combiner/ModalComponent';

    export default {
        props: ['unitsCount'],

        components: { RatesComponent, CharacteristicsComponent, ModalComponent },

        data() {
            return {
                units: []
            };
        },

        methods: {
            append(unit) {
                this.units.push(unit);

                if (this.unitsCount == this.units.length) {
                    this.init();
                }
            },

            init() {
                this.units.forEach(unit =>
                    unit.setUppers(this.units)
                        .setFormulas(this.units)
                );

                // 하위 조합을 모두 구성해야 빌드 스코어 계산이 가능합니다.
                this.units.forEach(unit => unit.calculateBuildScore());
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
