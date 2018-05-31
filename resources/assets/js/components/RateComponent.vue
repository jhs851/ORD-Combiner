<template>
    <div class="list-group p-1">
        <div class="list-group-item active py-1 px-2" v-text="rate.name" @click="show = ! show"></div>

        <units-component :class="classes" :data="rate.units"></units-component>
    </div>
</template>

<script>
    import UnitsComponent from './UnitsComponent.vue';

    export default {
        props: ['rate'],

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
        }
    }
</script>
