<template>
    <div class="register">
        <div class="trigger" v-on:click="show=!show">
            <img src="/images/download.png" alt="Download &amp; Register">
            <button class="btn small black">Download &amp; Register</button>
        </div>

        <div class="overlay" v-if="show">
            <form method="POST" action="/api/user" @submit.prevent="register()" v-if="registering">
                <div class="row">
                    <div class="col-sm-6">
                        <input class="textbox" type="text" name="firstname" id="firstname" v-model="form.firstname" />
                        <label for="firstname">First Name</label>
                        <p class="error" v-if="errors.firstname !== ''">{{errors.firstname}}</p>
                    </div>
                    <div class="col-sm-6">
                        <input class="textbox" type="text" name="lastname" id="lastname" v-model="form.lastname" />
                        <label for="lastname">Last Name</label>
                        <p class="error" v-if="errors.lastname !== ''">{{errors.lastname}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <input class="textbox" type="text" name="artist" id="artist" v-model="form.artist" />
                        <label for="artist">Performance / Artist Name</label>
                    </div>
                    <div class="col-sm-6">
                        <input class="textbox" type="text" name="location" id="location" v-model="form.location" />
                        <label for="location">Location eg. Sydney</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <input class="textbox" type="email" name="email" id="email" v-model="form.email" />
                        <label for="email">Email Address</label>
                        <p class="error" v-if="errors.email !== ''">{{errors.email}}</p>
                    </div>
                    <div class="col-sm-6">
                        <input class="textbox" type="text" name="phone" id="phone" v-model="form.phone" />
                        <label for="phone">Mobile Number</label>
                    </div>
                </div>

                <div class="terms_conditions">
                    <label>Terms &amp; Conditions</label>
                    <div class="terms">
                        <Terms />
                    </div>
                    <input type="checkbox" name="accept" id="accept" :checked="form.accept" v-model="form.accept" /> <label for="accept">I have read &amp; agreed to the Terms &amp; Conditions</label><p class="error" v-if="errors.accept !== ''">{{errors.accept}}</p>
                </div>

                <button class="btn red large" v-if="!saving">Register &amp; Download</button>
                <div class="saving" v-if="saving"><div class="spinner"></div></div>
                <p v-if="error" class="error" style="margin-top: 5px;">We were unable to register you. Please check the form above for errors.</p>
            </form>

            <div v-if="success">
                <h2>Thank you for registering</h2>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_P4hYwff3T0?rel=0&amp;showinfo=0?ecver=1" frameborder="0" allowfullscreen></iframe>
                </div>
                <a href="/video/super8musicvideo.mp4" class="btn red large" download>Download Video</a>
            </div>
        </div>

        <div class="background" v-on:click="hide()" v-if="show"></div>
    </div>
</template>

<script>

    import Terms from './Terms.vue'

    export default {

        data: function() {
            return {
                show: false,
                saving: false,
                error: false,
                registering: true,
                success: false,
                code: '',
                form: {
                    firstname: '',
                    lastname: '',
                    artist: '',
                    location: '',
                    email: '',
                    phone: '',
                    accept: false,
                },
                errors: {
                    firstname: '',
                    lastname: '',
                    accept: '',
                },
            };
        },

        components: {
            Terms,
        },

        created() {
            // has the user been sent here via the PayPal redirect?
            const url = location.search;
            let urlParams = {};
                url.replace(
                    new RegExp("([^?=&]+)(=([^&]*))?", "g"),
                    function($0, $1, $2, $3) {
                    urlParams[$1] = $3;
                }
            );
            if (urlParams.hasOwnProperty("register")) {
                this.show = true;
                window.history.pushState({}, document.title, "/");
            }
        },

        methods: {
            hide: function() {
                this.show = false
            },

            register: function() {

                this.saving = true;

                axios.post('api/registration', this.form)
                    .then(response => {
                        this.saving = false;
                        this.registering = false;
                        this.success = true;
                        this.error = false;
                        this.code = response.data.code;
                    })
                    .catch(error => {
                        this.saving = false;
                        this.error = true;

                        this.errors.firstname = error.response.data.hasOwnProperty("firstname") ? error.response.data.firstname[0] : '';
                        this.errors.lastname = error.response.data.hasOwnProperty("lastname") ? error.response.data.lastname[0] : '';
                        this.errors.email = error.response.data.hasOwnProperty("email") ? error.response.data.email[0] : '';
                        this.errors.accept = error.response.data.hasOwnProperty("accept") ? error.response.data.accept[0] : '';
                    });   

            },
        }
    }
</script>
