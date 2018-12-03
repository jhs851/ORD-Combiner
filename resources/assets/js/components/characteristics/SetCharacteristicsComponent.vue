<template>
    <div class="row no-gutters">
        <set-characteristic-component v-for="item in items" :characteristic="item" :key="item.id" @destroy="deletes" />
    </div>
</template>

<script>
    import SetCharacteristicComponent from './SetCharacteristicComponent';
    import collection from '../../mixins/collection.vue';

    export default {
        props: ['data'],

        components: { SetCharacteristicComponent },

        mixins: [ collection ],

        data() {
            return {
                items: this.data
            };
        },
    }
</script>
