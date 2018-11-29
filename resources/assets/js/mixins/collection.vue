<script>
    export default {
        data() {
            return {
                items: [],
                criteria: ''
            };
        },

        mounted() {
            this.$root.$on('maked', ({item}) => {
                if (typeof this.fetch === 'function') return this.fetch();

                if (this.criteria && item[this.criteria] == this[this.criteria]) this.items.push(item);
            });
        },

        methods: {
            deletes(id) {
                this.$delete(this.items, this.items.map(item => item.id).indexOf(id));
            }
        }
    }
</script>
