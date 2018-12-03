<template>
    <div class="col-lg-2 col-md-7 p-2">
        <div class="card p-1 z-depth-0">
            <div class="card-header white-text p-2" :style="styles">
                <span v-text="name"></span>
            </div>

            <div class="card-body z-depth-1 p-2">
                <input type="text" class="form-control" v-model="name">

                <swatches v-model="color"
                          class="mt-2"
                          colors="text-advanced"
                          show-fallback
                          shapes="squares"
                          :trigger-style="swatchTriggerStyles" />

                <input type="text" class="form-control" v-model="regexp">

                <button class="btn btn-primary btn-sm btn-block m-0" @click="update">Update</button>
                <button class="btn btn-danger btn-sm btn-block m-0 mt-1" @click="destroy">Destroy</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['characteristic'],

        data() {
            return {
                name: this.characteristic.name,
                color: this.characteristic.color,
                regexp: this.characteristic.regexp,
                endpoint: `/admin/characteristics/${this.characteristic.id}`
            };
        },

        computed: {
            styles() {
                return {
                    backgroundColor: this.color
                }
            }
        },

        methods: {
            update() {
                axios.put(this.endpoint, this.$data);
            },

            destroy() {
                if (confirm(`정말 '${this.name}' 특성을 삭제하시겠습니까?`))
                    axios.delete(this.endpoint)
                         .then(() => this.$emit('destroy', this.characteristic.id));
            }
        }
    }
</script>
