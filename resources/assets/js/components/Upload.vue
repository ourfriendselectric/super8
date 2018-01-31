<template>
    <div class="upload">
        <div class="trigger" v-on:click="show=!show">
            <img src="/images/upload.png" alt="Upload your track">
            <button class="btn small black">Upload your track</button>
        </div>

        <div class="overlay" v-if="show">
            <span v-on:click="show=!show" class="glyphicon glyphicon-remove close" aria-hidden="true"></span>
            <h3 style="text-align: center; margin-bottom: 0px;">Unfortunately, entries are now closed</h3>
        </div>

        <div class="background" v-on:click="hide()" v-if="show"></div>
    </div>
</template>

<script>
    var FileUpload = require('vue-upload-component');

    export default {

        props: {
            url: String,
            paypal: String,
        },

        data: function() {
            return {
                show: false,

                validEmail: false,
                userForm: { 
                    email: '', 
                    code: '',
                },
                emailError: '',
                userId: '',

                paid: false,
                discountAmount: 0,
                discountForm: { code: '', },
                discountError: '',
                paymentError: '',
                price: 55.00,
                itemName: 'Super8 Entry Fee',
                paypalLoading: false,

                returnUrl: this.url + '?success=true',
                cancelReturnUrl: this.url + '?cancelled=true',

                saving: false,
                tooltip: false,

                song: [],
                video: [],

                error: '',
                success: false,
            };
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
            if (urlParams.hasOwnProperty("success") || urlParams.hasOwnProperty("cancelled")) {
                this.show = true;
                this.userForm.email = urlParams.email;
                this.userForm.code = urlParams.code;
            } 
            if (urlParams.hasOwnProperty("discount")) {
                this.discountForm.code = urlParams.discount;
                this.applyDiscount();
            }
            if (urlParams.hasOwnProperty("success")) {
                axios.post('api/registration/code', this.userForm)
                .then(response => {
                    this.paid = true;
                    this.userId = response.data.id;
                })
                .catch(error => {
                    this.paymentError = 'There was an error logging your payment. Please contact us if you think this is in error.'
                });
            }
        },

        components: {
            FileUpload: FileUpload
        },

        computed: {

        },

        methods: {
            hide: function() {
                this.show = false;
                console.log(this.$route);
            },

            toggleTooltip: function() {
                this.tooltip = !this.tooltip
            },

            upload: function(asset) {
                asset[0].data = {
                    'id': this.userId,
                    'filename': asset[0].name,
                };
            },

            applyDiscount: function() {
                // Check if the discount code is valid or not
                axios.post('api/discount/check', this.discountForm)
                .then(response => {
                    this.discountError = '';
                    this.discountAmount = response.data.amount;
                    this.itemName = this.itemName + ' - $' + response.data.amount + ' off - ' + response.data.code;
                })
                .catch(error => {
                    this.discountError = error.response.data;
                });
            },

            makePayment: function() {
                if (this.userForm.email === '') {
                    this.emailError = 'We need your email address before payment can be made.'
                    return;
                }

                // Check the email address
                axios.post('api/registration/check', this.userForm)
                .then(response => {
                    this.emailError = '';
                    this.userId = response.data.id;
                    this.validEmail = true;

                    // have they alreay paid?
                    if (response.data.paid === true) {
                        this.paid = true;
                    } else {
                        this.returnUrl = this.returnUrl + '&email=' + response.data.email + '&code=' + response.data.code;
                        this.cancelReturnUrl = this.cancelReturnUrl + '&email=' + response.data.email;

                        if(this.discountForm.code) {
                            this.returnUrl = this.returnUrl + '&discount=' + this.discountForm.code;
                            this.cancelReturnUrl = this.cancelReturnUrl + '&discount=' + this.discountForm.code;
                        }

                        this.$nextTick(function () { // wait till the DOM i supdated
                            this.$refs.paypalbutton.submit();
                            this.paypalLoading = true;
                        })
                        
                    }

                })
                .catch(error => {
                    this.validEmail = false;
                    this.emailError = error.response.data.hasOwnProperty("email") ? error.response.data.email[0] : '';
                });
            },

            submitEntry: function() {
                this.error = '';
                // has the user paid?
                if (this.paid === false) {
                    this.error = 'You must pay the entry fee before you can upload.';
                    return;
                }

                // do we know the users userId?
                if (this.userId === false) {
                    this.error = 'We need you email address before you can submit.';
                    return;
                }

                if(this.song.length > 0) {
                    this.$refs.songUpload.active = true
                }

                if(this.video.length > 0) {
                    this.$refs.videoUpload.active = true
                }

                this.success = true;
            },
        }
    }
</script>
