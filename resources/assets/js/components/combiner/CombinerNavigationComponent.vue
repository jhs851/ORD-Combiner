<template>
    <nav id="combiner-nav" class="navbar navbar-expand-lg navbar-dark black lighten-3 fixed-bottom" style="z-index: 1060;">
        <a class="navbar-brand">
            <img src="/images/etc/icon.png" height="30" alt="">
        </a>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropup">
                    <a class="nav-link dropdown-toggle"
                       id="versionDropdownMenuLink"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false"
                       v-text="currentVersion.version"></a>

                    <div class="dropdown-menu dropdown-primary" aria-labelledby="versionDropdownMenuLink">
                        <a v-for="version in versions"
                           class="dropdown-item"
                           :class="{ 'disabled': currentVersion.id === version.id }"
                           :href="`/version?version=${version.version}&return=${referer}`"
                            v-text="version.version">
                        </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="/combiner" class="nav-link" data-toggle="tooltip" title="조합기">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tooltip" title="필터" @click="toggleCharacteristic">
                        <i class="fa fa-filter" aria-hidden="true"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tooltip" title="새로고침" @click="reset">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tooltip" title="전체화면" @click="toggleFullScreen">
                        <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>

            <loads-component v-if="auth" />

            <ul class="navbar-nav">
                <li class="nav-item dropup">
                    <a class="nav-link dropdown-toggle" id="authDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-text="user.name"></a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="authDropdownMenuLink">
                        <a class="dropdown-item" :href="`/users/${user.id}/loads`">코드 설정</a>

                        <a class="dropdown-item" href="/logout">로그아웃</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    import LoadsComponent from './LoadsComponent';
    import screenfull from 'screenfull';

    export default {
        props: ['referer', 'currentVersion'],

        components: { LoadsComponent },

        data() {
            return {
                versions: []
            }
        },

        created() {
            axios.get('/api/versions').then(({data}) => this.versions = data);
        },

        methods: {
            reset() {
                if (! confirm('정말 새로고침 하시겠습니까?')) return;

                this.$root.$emit('disableFilter');

                this.$root.$emit('reset');
            },

            toggleCharacteristic() {
                $('#characteristics-modal').modal('toggle');
            },

            toggleFullScreen() {
                if (screenfull.enabled) screenfull.toggle();
            }
        }
    }
</script>
