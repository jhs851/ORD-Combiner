<template>
    <div>
        <a @click="launch">
            <slot>
                <i class="fa fa-plus-circle fa-2x light-blue-text position-absolute"
                   aria-hidden="true"
                   data-toggle="tooltip"
                   data-placement="left"
                   :title="title"
                   style="right: 1rem; top: 0; cursor: pointer;"></i>
            </slot>
        </a>

        <div id="create-modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-text="title"></h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <component :is="`create-${this.type}-component`" ref="child" @created="stored"></component>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="store">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CreateRateComponent from './rates/CreateRateComponent';
    import CreateUnitComponent from './units/CreateUnitComponent';
    import CreateLoadComponent from './loads/CreateLoadComponent';
    import CreateCharacteristicComponent from './characteristics/CreateCharacteristicComponent';
    import CreateVersionComponent from './versions/CreateVersionComponent';
    import CreateAvatarComponent from './avatars/CreateAvatarComponent';

    export default {
        props: {
            type: {
                required: true,
                type: String
            },
            title: {
                type: String,
                default: '추가'
            }
        },

        components: { CreateRateComponent, CreateUnitComponent, CreateLoadComponent, CreateCharacteristicComponent, CreateVersionComponent, CreateAvatarComponent },

        methods: {
            launch() {
                $('#create-modal').modal('show');
            },

            store() {
                this.$refs.child.store();
            },

            stored(data) {
                $('#create-modal').modal('hide');

                this.$root.$emit('maked', data);
            }
        }
    }
</script>
