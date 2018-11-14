<script>
    export default {
        data() {
            return {
                items: []
            };
        },

        methods: {
            deletes(id) {
                this.$delete(this.items, this.items.map(item => item.id).indexOf(id));
            }
        }
    }
</script>
