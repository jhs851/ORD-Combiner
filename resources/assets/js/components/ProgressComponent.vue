<template>
    <div class="progress position-absolute h-100 py-1">
        <div :class="classes"
             role="progressbar"
             :style="`width: ${percent}%`"
             :aria-valuenow="percent"
             aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>
</template>

<script>
    export default {
        props: ['percent'],

        computed: {
            classes() {
                return ['progress-bar', 'h-100', this.percent == 100 ? 'ready' : 'ongoing'];
            }
        }
    }
</script>
