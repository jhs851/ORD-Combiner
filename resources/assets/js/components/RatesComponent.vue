<template>
    <div>
        <div v-for="rate in data" class="list-group p-1" :key="rate.id">
            <div class="list-group-item active py-1 px-2" v-text="rate.name" @click="show = ! show"></div>

            <units-component :class="classes" :data="rate.units" @update="updated"></units-component>
        </div>
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

        methods: {
            updated(unit) {
                this.$emit('fetch', unit);
            }
        },

        computed: {
            classes() {
                return ['collapse', this.show ? 'show' : ''];
            }
        }
    }
</script>
