<template>
    <div>
        <div class="form-group">
            <label for="rate-id">어떤 등급에 생성할지 선택해주세요.</label>
            <select id="rate-id" class="form-control" v-model="rate_id">
                <option></option>
                <option v-for="rate in rates" :value="rate.id" v-text="rate.name"></option>
            </select>
        </div>

        <div class="form-group">
            <label for="name">이름</label>
            <input id="name" type="text" class="form-control" v-model="name">
        </div>

        <div class="form-group">
            <label for="description">설명</label>
            <textarea id="description" class="form-control" v-model="description"></textarea>
        </div>

        <div class="form-group">
            <label for="count">갯수</label>
            <input id="count" type="number" class="form-control" v-model="count">
        </div>

        <div class="form-group">
            <div class="custom-file w-100">
                <input type="file" accept="image/*" class="custom-file-input" id="create-unit" @change="change">
                <label class="custom-file-label" for="create-unit" v-text="image"></label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                rate_id: '',
                name: 'Unknown',
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
                    this.name = 'Unknown';
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
