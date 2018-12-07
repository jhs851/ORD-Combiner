<template>
    <div class="col-lg-2 col-md-7 mb-4 text-center">
        <a @dblclick="update">
            <img :src="avatar.imageUrl" class="img-fluid rounded-circle z-depth-1" :class="{ 'active-border': active }" alt="">

            <h5 class="mt-4" :class="{ 'text-primary': active }" v-text="avatar.name"></h5>
        </a>
    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                avatar: this.data
            };
        },

        computed: {
            active() {
                return this.avatar.id == this.user.avatar.id;
            }
        },

        methods: {
            update() {
                axios.put(location.pathname, { 'avatar_id': this.avatar.id })
                     .then(({data}) => {
                         this.user.avatar = data.avatar;
                         this.user.avatarUrl = data.avatar.imageUrl;
                     });
            }
        }
    }
</script>

<style lang="scss">
    .active-border {
        border: 3px solid blue !important;
    }
</style>
