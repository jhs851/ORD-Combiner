<template>
    <div>
        <div class="form-group">
            <label for="clear">클리어 횟수</label>
            <input id="clear" type="number" class="form-control" v-model="clear" min="1" step="1">
        </div>

        <div class="form-group">
            <label for="code">코드</label>
            <input id="code" type="text" class="form-control" v-model="code">
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                clear: 1,
                code: '',
            };
        },

        created() {
            axios.get(`/api/users/${this.user.id}/loads/next`)
                 .then(({data}) => this.clear = data);
        },

        methods: {
            store() {
                axios.post(`/users/${this.user.id}/loads`, this.$data).then(({data}) => {
                    this.clear++;
                    this.code = '';

                    this.$emit('created', data);
                });
            }
        }
    }
</script>
