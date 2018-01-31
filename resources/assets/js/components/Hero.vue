<template>
    <header>
        <div class="super8">
            <img src="/images/logo.png" alt="Super8" width="190px">
        </div>

        <div class="social">
            <a href="mailto:entries@super8musicvideo.com" target="_blank"><img src="/images/email.png" alt="Email"></a>
            <a href="https://www.facebook.com/Super8MusicVideo/" target="_blank"><img src="/images/facebook.png" alt="Facebook"></a>
            <a href="https://www.instagram.com/super8musicvideo/" target="_blank"><img src="/images/instagram.png" alt="Instagram"></a>
        </div>

        <div class="steps">
            <div class="container-fluid">
                <div class="step watch">
                    <Watch />
                </div>
                <div class="step download">
                    <div class="trigger">
                        <img src="/images/download.png" alt="Download &amp; Register">
                        <button class="btn small black">Registrations Closed</button>
                    </div>
                </div>
                <div class="step upload">
                    <div class="trigger">
                        <img src="/images/upload.png" alt="Upload your track">
                        <button class="btn small black">Entries Closed</button>
                    </div>
                </div>
            </div>
        </div>

        <video autoplay loop id="video-background" muted plays-inline :poster="backgroundImage">
            <source src="/images/hero/background.mp4" type="video/mp4" />
            <img :src="backgroundImage" />
        </video>

    </header>
</template>

<script>

    import Watch from './Watch.vue'

    export default {

        data: function() {
            return {
                images: [
                    'background_1.jpg',
                    'background_2.jpg',
                    'background_3.jpg',
                    'background_4.jpg',
                ],
                backgroundImage: '',
            }
        },

        props: {
            url: String,
            paypal: String,
        },

        components: {
            Watch,
        },

        mounted: function () {
            const key = Math.floor(Math.random() * this.images.length);
            this.backgroundImage = this.url + '/images/hero/' + this.images[key];
        }
    }
</script>
