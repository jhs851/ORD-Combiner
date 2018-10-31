
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('combiner-view', require('./views/CombinerView.vue'));

const app = new Vue({
    el: '#app',

    methods: {
        setToastrOptions() {
            toastr.options = {
                useDanedenAnimationInShow: true,
                useDanedenAnimationInHide: true,
                showMethod: 'bounceInRight',
                hideMethod: 'fadeOutRight',
                positionClass: 'toast-bottom-right',
                timeOut: 3000,
                newestOnTop: false,
                progressBar: true,
            };
        },

        enableBootstrapToolTips() {
            $('[data-toggle="tooltip"]').tooltip();
        },

        disableButtonOnSubmit() {
            $('form:not(".except-disable")').on('submit', function() {
                let $btn = $(this).find('button[type="submit"]');
                const loadingHtml = `<i class="fa fa-spinner fa-pulse fa-fw"></i>`;

                if ($btn.html !== loadingHtml) {
                    $btn.data('original-html', $btn.html())
                        .addClass('disabled')
                        .html(loadingHtml);

                    setTimeout(() =>
                        $btn.html($btn.data('original-html'))
                            .removeClass('disabled')
                            .removeData('original-html')
                    , 3000);
                }
            });
        },
    },

    mounted() {
        this.setToastrOptions();
        this.enableBootstrapToolTips();
        this.disableButtonOnSubmit();
    }
});
