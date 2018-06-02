<template>
    <div>
        <div v-for="unit in data" class="list-group-item d-flex align-items-center justify-content-between py-1 px-2" :data-id="unit.id">
            <unit-component :data="unit" @modify="modified"></unit-component>
        </div>
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
