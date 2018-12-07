<template>
    <div class="row mt-3">
        <set-avatar-component v-for="item in items" :data="item" :key="item.id" @destroy="deletes" />

        <div v-if="! items.length" class="col-14">
            <h5 class="text-danger text-center py-4">아바타를 추가해주세요.</h5>
        </div>

        <div class="col-14 d-flex justify-content-end">
            <create-modal-component type="avatar" title="아바타 생성">
                <button class="btn btn-primary">아바타 생성</button>
            </create-modal-component>
        </div>
    </div>
</template>

<script>
    import CreateAvatarComponent from './CreateAvatarComponent';
    import SetAvatarComponent from './SetAvatarComponent';
    import collection from '../../mixins/collection.vue';

    export default {
        props: ['data'],

        components: { CreateAvatarComponent, SetAvatarComponent },

        mixins: [ collection ],

        data() {
            return {
                items: this.data,
            };
        },
    }
</script>
