<template>
    <button class="btn btn-sm px-2 py-1"
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
                this.active ? this.off(true) : this.on();
            },

            on() {
                this.active = true;

                this.$emit('on', this.data);
            },

            off(communication = false) {
                this.active = false;

                if (communication) {
                    this.$emit('off', this.data);
                }
            }
        },

        computed: {
            styles() {
                return {
                    backgroundColor: this.active ? this.data.color : 'transparent',
                    color: this.active ? 'white' : 'black'
                };
            }
        }
    }
</script>
