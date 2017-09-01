<template>
    <div class="watch">
        <div class="trigger" v-on:click="show=!show">
            <img src="/images/watch.png" alt="Watch">
            <button class="btn small black">Watch the video</button>
        </div>

        <div class="overlay" v-if="show">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_P4hYwff3T0?rel=0&amp;showinfo=0?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="background" v-on:click="show=!show" v-if="show"></div>
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
            hide: function() {
                this.show = false
            },
        }
    }
</script>
