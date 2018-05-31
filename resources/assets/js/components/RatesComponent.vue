<template>
    <div>
        <rate-component v-for="rate in rates" :rate="rate" :key="rate.id"></rate-component>
    </div>
</template>

<script>
    import RateComponent from './RateComponent.vue';

    export default {
        props: ['data'],

        components: { RateComponent },

        data() {
            return {
                rates: this.data
            };
        }
    }
</script>
