<template>
    <div>
        <div class="form-group">
            <label for="column-id">몇번째 컬럼에 생성할지 선택해주세요.</label>
            <select id="column-id" class="form-control" v-model="column_id">
                <option></option>
                <option v-for="column in columns" :value="column" v-text="column"></option>
            </select>
        </div>

        <div class="form-group">
            <label for="name">이름</label>
            <input id="name" type="text" class="form-control" v-model="name">
        </div>

        <div class="form-group">
            <label>배경색</label>
            <swatches v-model="color"
                      colors="text-advanced"
                      show-fallback
                      shapes="squares"
                      :trigger-style="swatchTriggerStyles" />
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                column_id: '',
                name: '',
                color: '#000',
                columns: []
            };
        },

        created() {
            axios.get('/api/admin/columns').then(({data}) => this.columns = data);
        },

        methods: {
            store() {
                axios.post('/admin/rates', this.$data).then(({data}) => {
                    this.column_id = '';
                    this.name = '';
                    this.color = '#000';

                    this.$emit('created', data);
                });
            }
        }
    }
</script>
