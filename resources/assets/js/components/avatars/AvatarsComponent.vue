<template>
    <div class="row mt-5">
        <avatar-component v-for="item in items" :data="item" :key="item.id" />
    </div>
</template>

<script>
    import AvatarComponent from './AvatarComponent';

    export default {
        props: ['data'],

        components: { AvatarComponent },

        data() {
            return {
                items: this.data
            };
        }
    }
</script>
