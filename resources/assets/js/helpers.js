import Swatches from 'vue-swatches';
import 'vue-swatches/dist/vue-swatches.min.css';

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
});
