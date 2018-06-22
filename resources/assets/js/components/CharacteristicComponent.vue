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
                this.active ? this.off() : this.on();
            },

            on() {
                this.active = true;

                this.$root.$emit('filter', this.data);
            },

            off(communication = true) {
                this.active = false;

                if (communication) {
                    this.$root.$emit('except', this.data);
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
