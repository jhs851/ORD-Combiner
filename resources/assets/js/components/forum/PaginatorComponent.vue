<template>
    <ul v-show="shouldPagenate" class="pagination pagination-circle mt-4" role="navigation">
        <li v-show="! prevUrl" class="page-item disabled" aria-disabled="true">
            <span class="page-link">First</span>
        </li>

        <li v-show="! prevUrl" class="page-item disabled" aria-disabled="true">
            <span class="page-link" aria-hidden="true">&lsaquo;</span>
        </li>

        <li v-show="prevUrl" class="page-item">
            <a class="page-link" href="#" rel="first" @click.prevent="page = 1">First</a>
        </li>

        <li v-show="prevUrl" class="page-item">
            <a class="page-link" href="#" rel="prev" @click.prevent="page--">&lsaquo;</a>
        </li>

        <li v-for="index in lastPage" class="page-item" :class="{ 'active': active(index) }" aria-current="page">
            <span v-show="active(index)" class="page-link" v-text="index"></span>

            <a v-show="! active(index)" class="page-link" href="#" v-text="index" @click.prevent="page = index"></a>
        </li>

        <li v-show="nextUrl" class="page-item">
            <a class="page-link" href="#" rel="next" @click.prevent="page++">&rsaquo;</a>
        </li>

        <li v-show="nextUrl" class="page-item">
            <a class="page-link" href="#" rel="last" @click.prevent="page = lastPage">Last</a>
        </li>

        <li v-show="! nextUrl" class="page-item disabled" aria-disabled="true">
            <span class="page-link" aria-hidden="true">&rsaquo;</span>
        </li>

        <li v-show="! nextUrl" class="page-item disabled" aria-disabled="true">
            <span class="page-link" aria-hidden="true">Last</span>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['dataSet'],

        data() {
            return {
                page: 1,
                prevUrl: false,
                nextUrl: false,
                lastPage: false
            };
        },

        watch: {
            dataSet() {
                this.page = this.dataSet.current_page;
                this.prevUrl = this.dataSet.prev_page_url;
                this.nextUrl = this.dataSet.next_page_url;
                this.lastPage = this.dataSet.last_page;
            },

            page() {
                this.broadcast().updateUrl();
            }
        },

        computed: {
            shouldPagenate() {
                return !! this.prevUrl || !! this.nextUrl;
            }
        },

        methods: {
            broadcast() {
                return this.$emit('changed', this.page);
            },

            updateUrl() {
                history.pushState(null, null, `?page=${this.page}`);
            },

            active(index) {
                return this.page == index;
            }
        }
    }
</script>
