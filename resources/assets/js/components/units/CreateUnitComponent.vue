<template>


</template>

<script>
    export default {
        data() {
            return {
                rate_id: '',
                name: '',
                description: '',
                count: 0,
                image: '이미지를 선택해주세요.',
                rates: []
            };
        },

        created() {
            axios.get('/api/admin/rates').then(({data}) => this.rates = data);
        },

        methods: {
            store() {
                let formData = new FormData();

                formData.append('rate_id', this.rate_id);
                formData.append('name', this.name);
                formData.append('description', this.description);
                formData.append('count', this.count);
                formData.append('image', document.getElementById('create-unit').files[0]);

                axios.post('/admin/units', formData).then(({data}) => {
                    this.rate_id = '';
                    this.name = '';
                    this.description = '';
                    this.count = 0;

                    this.$emit('created', data);
                });
            },

            change(e) {
                this.image = e.target.files[0].name;
            }
        }
    }
</script>
