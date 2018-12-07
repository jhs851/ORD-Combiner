<template>
    <div class="text-left">
        <div class="form-group">
            <label for="name">이름</label>
            <input id="name" type="text" class="form-control" v-model="name">
        </div>

        <div class="form-group">
            <label for="limit">제한</label>
            <input id="limit" type="number" class="form-control" v-model="limit">
        </div>

        <div class="form-group">
            <div class="custom-file w-100">
                <input type="file" accept="image/*" class="custom-file-input" id="create-avatar" @change="change">
                <label class="custom-file-label" for="create-avatar" v-text="image"></label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                limit: 0,
                image: '이미지를 선택해주세요.'
            };
        },

        methods: {
            store() {
                let formData = new FormData();

                formData.append('name', this.name);
                formData.append('limit', this.limit);
                formData.append('image', document.getElementById('create-avatar').files[0]);

                axios.post('/admin/avatars', formData).then(({data}) => {
                    this.name = '';
                    this.limit = 0;

                    this.$emit('created', data);
                });
            },

            change(e) {
                this.image = e.target.files[0].name;
            }
        }
    }
</script>
