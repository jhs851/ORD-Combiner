<template>
    <div>
        <div class="list-group-item active py-1 px-2" v-text="data.name" @click="show = ! show"></div>

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
            }
        },

        methods: {
            updated(unit) {
                this.$emit('fetch', unit);
            }
        }
    }
</script>
