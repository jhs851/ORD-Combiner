<template>
    <div>
        <unit-component v-for="unit in data"
                        :data="unit"
                        :key="unit.id"
                        @modify="modified"></unit-component>
    </div>
</template>

<script>
    import UnitComponent from "./UnitComponent";

    export default {
        props: ['data'],

        components: { UnitComponent },

        methods: {
            modified(unit) {
                this.$emit('update', unit);
            }
        }
    }
</script>
