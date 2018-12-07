<template>
    <div :data-id="unit.id" class="draggable card p-1 z-depth-0 list-group-item">
        <div class="card-header p-1 d-flex justify-content-between align-items-center" style="cursor: pointer;" @click="show = ! show">
            <div class="d-flex align-items-center">
                <img class="img-fluid" width="21" height="21" :src="unit.imageUrl" alt="">
                <span class="ml-1" v-text="unit.name"></span>
            </div>

            <i class="fa fa-arrows handle" aria-hidden="true" style="cursor: move;"></i>
        </div>

        <div class="card-body z-depth-1 p-2" v-if="show">
            <input type="text" class="form-control" v-model="unit.name">
            <textarea class="form-control mt-2" v-model="unit.description"></textarea>
            <input type="number" class="form-control mt-2" v-model="unit.count">

            <div class="mt-2">
                <div class="custom-file w-100">
                    <input type="file" accept="image/*" class="custom-file-input" :id="`image-${unit.id}`" @change="change">
                    <label class="custom-file-label" :for="`image-${unit.id}`">{{ unit.image | strLimit }}</label>
                </div>

                <a class="w-100" :href="unit.imageUrl" target="_blank">
                    <small>{{ currentImage | strLimit }}</small>
                </a>
            </div>

            <button class="btn btn-primary btn-sm btn-block m-0 mt-1" @click="update">Update</button>
            <button class="btn btn-danger btn-sm btn-block m-0 mt-1" @click="destroy">Destroy</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                unit: this.data,
                endpoint: `/admin/units/${this.data.id}`,
                show: false,
                currentImage: this.data.image
            };
        },

        methods: {
            update() {
                let formData = new FormData();
                let image = document.getElementById(`image-${this.unit.id}`).files[0];

                formData.append('name', this.unit.name);
                formData.append('description', this.unit.description);
                formData.append('count', this.unit.count);
                if (image) formData.append('image', image);

                axios.post(this.endpoint, formData)
                     .then(({data}) => {
                         this.unit = data.unit;
                         this.currentImage = data.unit.image;
                     });
            },

            destroy() {
                if (confirm(`해당 유닛을 삭제하면 유닛의 조합법과 유닛의 상위 조합법도 모두 삭제됩니다.\n정말 '${this.unit.name}' 유닛을 삭제하시겠습니까?`))
                    axios.delete(this.endpoint).then(() => this.$emit('destroy', this.unit.id));
            },

            change(e) {
                this.unit.image = e.target.files[0].name;
            }
        }
    }
</script>
