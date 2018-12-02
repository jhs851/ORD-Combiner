<template>
    <div class="modal left" id="characteristics-modal" tabindex="-1" role="dialog" aria-labelledby="characteristics-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-full-height modal-left" role="document" style="width: 14.28571429%;">
            <div class="modal-content">
                <div class="modal-body px-0">
                    <div class="characteristics d-flex flex-wrap justify-content-center">
                        <button class="btn btn-default px-2 py-1" @click.prevent="all">전체</button>

                        <characteristic-component v-for="characteristic in data" :key="characteristic.id" :data="characteristic" ref="children" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CharacteristicComponent from './CharacteristicComponent';

    export default {
        props: ['data'],

        components: { CharacteristicComponent },

        methods: {
            all() {
                this.$refs.children.forEach(child => child.active = false);

                this.$root.$emit('disableFilter');
            }
        }
    }
</script>
