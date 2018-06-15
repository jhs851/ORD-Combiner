<template>
    <div class="d-flex flex-wrap justify-content-center">
        <button class="btn btn-default px-2 py-1" @click.prevent="all" style="font-size: .8rem;">전체</button>

        <characteristic-component v-for="characteristic in data" :key="characteristic.id" :data="characteristic" ref="children"></characteristic-component>
    </div>
</template>

<script>
    import CharacteristicComponent from './CharacteristicComponent.vue';

    export default {
        props: ['data'],

        components: { CharacteristicComponent },

        methods: {
            all() {
                this.$refs.children.forEach(child => child.off());

                this.$root.$emit('filter', {});
            }
        }
    }
</script>
