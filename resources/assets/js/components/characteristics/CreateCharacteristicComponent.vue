<template>
    <div>
        <div class="form-group">
            <label for="name">이름</label>
            <input id="name" type="text" class="form-control" v-model="name">
        </div>

        <div class="form-group">
            <label>배경색</label>
            <swatches v-model="color"
                      colors="text-advanced"
                      show-fallback
                      shapes="squares"
                      :trigger-style="swatchTriggerStyles" />
        </div>

        <div class="form-group">
            <label for="regexp">정규식</label>

            <div class="checkbox-field d-inline-block ml-2">
                <input type="checkbox" name="same" id="same" v-model="same">
                <label for="same">이름과 동일</label>
            </div>

            <input id="regexp" type="text" class="form-control" v-model="getRegexp">
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                color: '#000',
                same: true,
                regexp: ''
            };
        },

        computed: {
            getRegexp() {
                return this.same ? this.name : this.regexp;
            }
        },

        methods: {
            store() {
                axios.post('/admin/characteristics', $.extend(this.$data, { regexp: this.getRegexp }))
                     .then(({data}) => {
                         this.name = '';
                         this.color = '#000';
                         this.regexp = '';

                         this.$emit('created', data);
                     });
            }
        }
    }
</script>
