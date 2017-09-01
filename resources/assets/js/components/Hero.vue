<template>
    <header>
        <div class="super8">
            <img src="/images/logo.png" alt="Super8" width="190px">
        </div>

        <div class="social">
            <a href="#"><img src="/images/email.png" alt="Email"></a>
            <a href="#"><img src="/images/facebook.png" alt="Facebook"></a>
            <a href="#"><img src="/images/instagram.png" alt="Instagram"></a>
        </div>

        <div class="steps">
            <div class="container-fluid">
                <div class="step watch">
                    <Watch />
                </div>
                <div class="step download">
                    <Register />
                </div>
                <div class="step upload">
                    <Upload 
                        :url="url" 
                        :paypal="paypal" 
                    />
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

    import Register from './Register.vue'
    import Watch from './Watch.vue'
    import Upload from './Upload.vue'

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
            Register,
            Watch,
            Upload,
        },

        mounted: function () {
            const key = Math.floor(Math.random() * this.images.length);
            this.backgroundImage = this.url + '/images/hero/' + this.images[key];
        }
    }
</script>
