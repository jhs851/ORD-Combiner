<template>
    <div class="col-lg-2 col-md-7 mb-4">
        <div class="text-center">
            <img :src="avatar.imageUrl" class="img-fluid rounded-circle z-depth-1" alt="">
        </div>

        <div v-if="editing">
            <input type="text" class="form-control mt-2" v-model="avatar.name">
            <input type="number" class="form-control mt-2" v-model="avatar.limit">
            <div class="mt-2">
                <div class="custom-file w-100">
                    <input type="file" accept="image/*" class="custom-file-input" :id="`image-${avatar.id}`" @change="change">
                    <label class="custom-file-label" :for="`image-${avatar.id}`">{{ avatar.image | strLimit }}</label>
                </div>

                <a class="w-100" :href="avatar.imageUrl" target="_blank">
                    <small>{{ currentImage | strLimit }}</small>
                </a>
            </div>

            <button class="btn btn-info btn-block btn-sm mt-2" @click="update">수정</button>
            <button class="btn btn-outline-info btn-block btn-sm mt-2" @click="cancel">취소</button>
        </div>

        <div class="text-center" v-else>
            <h5 class="mt-4 mb-3" v-text="avatar.name"></h5>
            <p class="text-uppercase blue-text"><strong v-text="`제한: ${avatar.limit}`"></strong></p>

            <button class="btn btn-primary btn-block btn-sm mt-2" @click="editing = true">수정</button>
            <button class="btn btn-danger btn-block btn-sm mt-2" @click="destroy">삭제</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                avatar: this.data,
                endpoint: `/admin/avatars/${this.data.id}`,
                currentImage: this.data.image,
                editing: false
            };
        },

        methods: {
            update() {
                let formData = new FormData();
                let image = document.getElementById(`image-${this.avatar.id}`).files[0];

                formData.append('name', this.avatar.name);
                formData.append('limit', this.avatar.limit);
                if (image) formData.append('image', image);

                axios.post(this.endpoint, formData)
                     .then(({data}) => {
                         this.editing = false;
                         this.avatar = data.avatar;
                         this.currentImage = data.avatar.image;
                     });
            },

            cancel() {
                this.editing = false;
                this.avatar = this.data;
            },

            destroy() {
                if (confirm(`정말 '${this.avatar.name}' 아바타를 삭제하시겠습니까?`))
                    axios.delete(this.endpoint).then(() => this.$emit('destroy', this.avatar.id));
            },

            change(e) {
                this.avatar.image = e.target.files[0].name;
            }
        }
    }
</script>
