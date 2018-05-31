<template>
    <div>
        <unit-component v-for="unit in units" :data="unit" :key="unit.id"></unit-component>
    </div>
</template>

<script>
    import UnitComponent from './UnitComponent.vue';

    export default {
        props: ['data'],

        components: { UnitComponent },

        data() {
            return {
                units: this.data
            };
        },
    }
</script>
