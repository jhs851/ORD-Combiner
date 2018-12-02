<template>
    <button class="btn px-2 py-1"
       @click.prevent="toggle"
       v-text="data.name"
       :style="styles"></button>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                active: false
            };
        },

        methods: {
            toggle() {
                this.$root.$emit(this.active ? 'except' : 'filter', this.data);

                this.active = ! this.active;
            }
        },

        computed: {
            styles() {
                return {
                    backgroundColor: this.active ? this.data.color : 'transparent'
                };
            }
        }
    }
</script>
