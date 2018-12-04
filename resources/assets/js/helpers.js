import Swatches from 'vue-swatches';
import 'vue-swatches/dist/vue-swatches.min.css';
import Popover from 'vue-js-popover'
import VueClipboard from 'vue-clipboard2';

VueClipboard.config.autoSetContainer = true;

Vue
    .use(Popover)
    .use(VueClipboard)
    .mixin({
        components: { Swatches },

        data() {
            return {
                user: {}
            };
        },

        created() {
            this.user = this.auth ? window.user : {};
        },

        filters: {
            diffForHumans(date) {
                return moment(date).locale('ko').fromNow();
            }
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
        },

        methods: {
            destroy(e) {
                if (! confirm('정말 삭제하시겠습니까?')) e.preventDefault();
            }
        }
    });
