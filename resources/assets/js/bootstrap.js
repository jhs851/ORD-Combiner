
window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    window.Vue = require('vue');

    window.toastr = require('toastr');

    require('bootstrap');

    require('textarea-autosize');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.interceptors.response.use(response => {
    if (response.data.level && response.data.message) toastr[response.data.level](response.data.message);

    return response;
}, error => {
    Promise.reject(error).catch(e => {
        let errors = e.response.data.errors;

        if (errors) $.each(errors, (index, value) => toastr.error(value[0]));
    });

    return Promise.reject(error)
});

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.PRE_BUILD_ID = 0;
window.LOCK_UNITS = [];
window.USE_ETC = true;
window.RECORDER = [];
window.IS_RECORD_LOWEST = false;
window.IS_RECORD = false;

window.events = new Vue();
window.refreshAll = () => window.events.$emit('refreshAll');

window.auth = document.head.querySelector('meta[name="auth"]').content;
if (window.auth) window.user = JSON.parse(document.head.querySelector('meta[name="user"]').content);
