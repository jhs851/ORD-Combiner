<template>
    <div class="d-inline-block m-1" :class="{ 'border border-primary': unit_id == formula.id }">
        <img class="img-fluid" :src="formula.imageUrl" alt="" style="width: 40px; height: 40px; cursor:pointer;" @click="set" @dblclick="edit"><br>
        <small v-html="name"></small>
    </div>
</template>


<script>
    export default {
        props: ['unit_id', 'formula'],

        computed: {
            name() {
                return this.formula.name + `<small>(${this.formula.rate.name})</small>`;
            },
        },

        methods: {
            set() {
                this.$emit('set', this.formula.id);
            },

            edit() {
                this.$emit('edit', this.formula.id);
            }
        }
    }
</script>
