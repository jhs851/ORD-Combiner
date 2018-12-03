<template>
    <div>
        <div class="form-group">
            <label for="version">버전</label>
            <input id="version" type="text" class="form-control" v-model="version">
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                version: '',
            };
        },

        methods: {
            store() {
                axios.post('/admin/versions', this.$data).then(({data}) => {
                    this.version = '';

                    this.$emit('created', data);
                });
            }
        }
    }
</script>
