import Swatches from 'vue-swatches';
import 'vue-swatches/dist/vue-swatches.min.css';
import Popover  from 'vue-js-popover'

Vue.mixin({
    components: { Swatches },

    computed: {
        swatchTriggerStyles() {
            return {
                width: '100%',
                height: '42px'
            }
        }
    }
}).use(Popover);
