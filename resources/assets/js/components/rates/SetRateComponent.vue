<template>
    <div :data-id="rate.id" class="draggable card p-1 z-depth-0">
        <div class="card-header white-text p-2 d-flex justify-content-between align-items-center" :style="styles" @click="show = ! show">
            <span v-text="name"></span>
            <i class="fa fa-arrows handle" aria-hidden="true" style="cursor: move;"></i>
        </div>

        <div class="card-body z-depth-1 p-2" v-if="show">
            <input type="text" class="form-control" v-model="name">

            <swatches v-model="color"
                      class="mt-2"
                      colors="text-advanced"
                      show-fallback
                      shapes="squares"
                      :trigger-style="swatchTriggerStyles" />

            <button class="btn btn-primary btn-sm btn-block m-0" @click="update">Update</button>
            <button class="btn btn-danger btn-sm btn-block m-0 mt-1" @click="destroy">Destroy</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['rate'],

        data() {
            return {
                name: this.rate.name,
                color: this.rate.color,
                endpoint: `/admin/rates/${this.rate.id}`,
                show: false
            };
        },

        computed: {
            styles() {
                return {
                    backgroundColor: this.color,
                    cursor: 'pointer'
                }
            }
        },

        methods: {
            update() {
                axios.put(this.endpoint, this.$data);
            },

            destroy() {
                if (confirm(`해당 컬럼을 삭제하면 하위 유닛도 모두 삭제됩니다.\n정말 '${this.name}' 컬럼을 삭제하시겠습니까?`))
                    axios.delete(this.endpoint)
                         .then(() => this.$emit('destroy', this.rate.id));
            }
        }
    }
</script>
