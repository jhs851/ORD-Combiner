<template>
    <div>
        <unit-component v-for="unit in data"
                        :data="unit"
                        :key="unit.id"
                        @modify="modified"
                        class="list-group-item d-flex align-items-center justify-content-between py-1 px-2"
                        :data-id="unit.id"></unit-component>
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
