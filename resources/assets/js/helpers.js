import Swatches from 'vue-swatches';
import 'vue-swatches/dist/vue-swatches.min.css';
import Popover from 'vue-js-popover'
import VueClipboard from 'vue-clipboard2';

VueClipboard.config.autoSetContainer = true;

Vue.mixin({
    components: { Swatches },

    data() {
        return {
            user: {}
        };
    },

    created() {
        this.user = this.auth ? window.user : {};
    },

    computed: {
        auth() {
            return !! window.auth;
        },

        swatchTriggerStyles() {
            return {
                width: '100%',
                height: '42px'
            }
        }
    }
}).use(Popover).use(VueClipboard);
