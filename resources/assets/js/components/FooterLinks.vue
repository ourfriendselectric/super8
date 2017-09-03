<template>
    <div class="termspopup">
        <span v-on:click="show=!show">terms &amp; conditions</span> &#124; <a href="/?register=true">join our mailing list</a> &#124; <a href="mailto:entries@super8musicvideo.com">contact us</a>

        <div class="overlay" v-if="show">
            <div class="row">
                <div class="terms">
                    <Terms />
                </div>
            </div>
        </div>

        <div class="background" v-on:click="show=!show" v-if="show"></div>
    </div>
</template>

<script>

    import Terms from './Terms.vue'

    export default {

        data: function() {
            return {
                show: false,
            };
        },

        components: {
            Terms,
        },

        computed: {

        },

        methods: {
            hide: function() {
                this.show = false
            },
        }
    }
</script>
