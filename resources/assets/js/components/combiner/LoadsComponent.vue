<template>
    <ul class="navbar-nav">
        <li class="nav-item dropup">
            <a class="nav-link dropdown-toggle"
               id="loadDropdownMenuLink"
               data-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false"
               v-text="`클리어 횟수 ${currentLoad.clear} `"></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="loadDropdownMenuLink">
                <a class="dropdown-item" v-for="load in loads" v-text="load.clear" @click="change(load)"></a>
            </div>
        </li>

        <li class="nav-item mr-3">
            <div class="input-group">
                <input type="text" class="form-control" aria-describedby="button-addon" readonly :value="code" style="width: 150px;">

                <div class="input-group-append">
                    <button class="btn btn-md btn-outline-default m-0 px-3 py-2 z-depth-0" id="button-addon" @click="copy">
                        코드 복사
                    </button>

                    <create-modal-component class="d-flex align-items-stretch" type="load" title="코드 생성">
                        <button class="btn btn-md btn-outline-default m-0 px-3 py-2 z-depth-0" style="border-left: 0 !important;">
                            코드 추가
                        </button>
                    </create-modal-component>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        data() {
            return {
                loads: [],
                maxLoad: {},
                currentLoad: {}
            };
        },

        created() {
            this.loads = this.user.loads;
            this.maxLoad = this.user.maxLoad;
            this.currentLoad = this.user.maxLoad;
        },

        mounted() {
            this.$root.$on('maked', ({item}) => this.change(item).loads.unshift(item));
        },

        computed: {
            code() {
                return `-load ${this.currentLoad.code}`;
            }
        },

        methods: {
            change(load) {
                this.currentLoad = load;

                return this;
            },

            copy() {
                this.$copyText(this.code)
                    .then(() => toastr.success('복사되었습니다.'), () => toastr.error('복사하지 못했습니다.'));
            }
        }
    }
</script>
