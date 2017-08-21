<template>
    <div class="register">
        <div class="trigger" v-on:click="show=!show">
            <img src="/images/watch.png" alt="Watch">
            <button>Watch the video</button>
        </div>

        <div class="overlay watch" v-if="show">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kfVsfOSbJY0?rel=0&amp;showinfo=0?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="background" v-on:click="hide()" v-if="show"></div>
    </div>
</template>

<script>
    export default {

        data: function() {
            return {
                show: false,
            };
        },

        computed: {

        },

        methods: {
            show: function() {
                this.show = true
            },

            hide: function() {
                this.show = false
            },
        }
    }
</script>
