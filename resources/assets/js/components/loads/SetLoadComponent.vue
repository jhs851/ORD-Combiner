<template>
    <tr>
        <td><input type="checkbox" :value="item.id" @change="changeCheck"></td>

        <td v-if="editing"><input type="number" class="form-control" v-model="load.clear" min="1" step="1"></td>
        <td v-else v-text="load.clear"></td>

        <td v-if="editing"><input type="text" class="form-control" v-model="load.code"></td>
        <td v-else v-text="load.code"></td>

        <td v-if="editing">
            <a class="btn btn-info btn-floating btn-sm m-0 p-0" @click="update">
                <i class="fa fa-upload" aria-hidden="true"></i>
            </a>
            <a class="btn btn-outline-info btn-floating btn-sm m-0 p-0 ml-2" @click="cancel">
                <i class="fa fa-ban" aria-hidden="true"></i>
            </a>
        </td>
        <td v-else>
            <a class="btn btn-primary btn-floating btn-sm m-0 p-0" @click="editing = true">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
        </td>
    </tr>
</template>

<script>
    export default {
        props: ['item'],

        data() {
            return {
                oldLoad: this.item,
                load: this.item,
                editing: false
            };
        },

        methods: {
            changeCheck() {
                this.$parent.toggleCheck();
            },

            update() {
                axios.put(`${location.pathname}/${this.item.id}`, { code: this.load.code, clear: this.load.clear })
                     .then(() => {
                         this.editing = false;
                         this.oldLoad = this.load;
                     });
            },

            cancel() {
                this.editing = false;
                this.load = this.oldLoad;
            }
        }
    }
</script>
