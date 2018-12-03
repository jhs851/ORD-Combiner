<template>
    <tr>
        <td><input type="checkbox" :value="item.id" @change="changeCheck"></td>

        <td v-if="editing"><input type="text" class="form-control" v-model="version.version"></td>
        <td v-else v-text="version.version"></td>

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
                oldVersion: this.item,
                version: this.item,
                editing: false
            };
        },

        methods: {
            changeCheck() {
                this.$parent.toggleCheck();
            },

            update() {
                axios.put(`${location.pathname}/${this.item.id}`, { version: this.version.version })
                     .then(() => {
                         this.editing = false;
                         this.oldVersion = this.version;
                     });
            },

            cancel() {
                this.editing = false;
                this.version = this.oldVersion;
            }
        }
    }
</script>
