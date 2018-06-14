<template>
    <div>
        <button class="btn btn-default btn-sm px-2 py-1" @click.prevent="all">전체</button>

        <characteristic-component v-for="characteristic in data" :key="characteristic.id" :data="characteristic" @on="filter" @off="remove" ref="children"></characteristic-component>
    </div>
</template>

<script>
    import CharacteristicComponent from './CharacteristicComponent.vue';

    export default {
        props: ['data'],

        components: { CharacteristicComponent },

        data() {
            return {
                actives: [],
                includes: []
            };
        },

        methods: {
            filter(characteristic) {
                this.actives.push(characteristic);

                this.refresh();
            },

            remove(characteristic) {
                delete this.actives[this.actives.indexOf(characteristic)];

                this.refresh();
            },

            all() {
                this.actives = [];

                this.$refs.children.forEach(child => child.off());

                this.refresh();
            },

            refresh() {
                this.includes = [];

                this.actives.forEach(characteristic => this.includes = this.includes.concat(characteristic.included));

                this.$root.$emit('filter', this.includes);
            }
        }
    }
</script>
