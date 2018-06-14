<template>
    <div class="progress position-absolute h-100 py-1">
        <div class="progress-bar h-100"
             role="progressbar"
             :style="styles"
             :aria-valuenow="percent"
             aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>
</template>

<script>
    export default {
        props: ['percent'],

        computed: {
            styles() {
                return {
                    width: this.percent + '%',
                    backgroundColor: this.percent == 100 ? '#76ff03' : '#bbdefb'
                }
            }
        }
    }
</script>
