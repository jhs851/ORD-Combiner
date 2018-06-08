<template>
    <div>
        <div class="list-group-item py-1 px-2 text-white" v-text="data.name" @click="show = ! show" :style="styles"></div>

        <units-component :class="classes" :data="data.units" @update="updated"></units-component>
    </div>
</template>

<script>
    import UnitsComponent from './UnitsComponent.vue';

    export default {
        props: ['data'],

        components: { UnitsComponent },

        data() {
            return {
                show: true
            };
        },

        computed: {
            classes() {
                return ['collapse', this.show ? 'show' : ''];
            },

            styles() {
                return {
                    backgroundColor: this.data.color,
                    borderColor: this.data.color
                }
            }
        },

        methods: {
            updated(unit) {
                this.$emit('fetch', unit);
            }
        }
    }
</script>
