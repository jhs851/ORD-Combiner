<template>
    <div>
        <rate-component :data="rate" v-for="rate in data" class="list-group p-1" :key="rate.id" @fetch="fetched"></rate-component>
    </div>
</template>

<script>
    import RateComponent from './RateComponent';

    export default {
        props: ['data'],

        components: { RateComponent },

        methods: {
            fetched(unit) {
                this.$emit('push', unit);
            }
        }
    }
</script>
