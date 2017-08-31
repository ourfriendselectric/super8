<template>
    <div class="upload">
        <div class="trigger" v-on:click="show=!show">
            <img src="/images/upload.png" alt="Upload your track">
            <button class="btn small black">Upload your track</button>
        </div>


        <div class="overlay" v-if="show">
            <h4>1. Enter Your Email Address</h4>
            <div class="row">
                <div class="col-sm-6">
                    <input class="textbox" type="email" name="email" id="email" v-model="userForm.email" />
                </div> 
                <div class="col-sm-6">
                    <p>If you have not registered yet, you can do so <a href="#">here</a></p>
                </div>
                <div class="col-sm-12">
                    <p class="error" v-if="emailError !== ''">{{emailError}}</p>
                </div>
            </div>

            
            <h4>2. Pay Entrance Fee</h4>
            <div class="row">
                <div class="col-sm-12 payment-details">
                    <div v-if="discountAmount === 0">
                        Total to Pay: $55
                    </div>
                    <div v-if="discountAmount !== 0">
                        Subtotal: $55<br />
                        Discount: ${{discountAmount}}<br />
                        Total to Pay: ${{price - discountAmount}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" @submit.prevent="makePayment()" ref="paypalbutton">
                        <input type="hidden" name="item_name" :value="itemName">
                        <input type="hidden" name="amount" :value="price - discountAmount">
                        <input type="hidden" name="return" :value="returnUrl">
                        <input type="hidden" name="cancel_return" :value="cancelReturnUrl">

                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="SEVMNCQ4JYVBN">
                        <input type="hidden" name="lc" value="AU">
                        <input type="hidden" name="item_number" value="super8">
                        <input type="hidden" name="currency_code" value="AUD">
                        <input type="hidden" name="button_subtype" value="services">
                        <input type="hidden" name="no_note" value="1">
                        <input type="hidden" name="no_shipping" value="1">
                        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
                        <button v-if="!paid && !paypalLoading " class="btn black small pay">Pay via PayPal</button>
                        <div v-if="paid" class="btn black small pay"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Thank you for your payment</div>
                        <div class="btn black small pay saving" v-if="paypalLoading"><div class="spinner"></div></div>
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
                <div class="col-sm-6 discount-details">
                    <div class="row">
                        <div class="col-sm-8 discount-code-input">
                            <input type="" name="discount" value="" class="textbox" v-model="discountForm.code" />
                            <label>Discount code</label>
                        </div>
                        <div class="col-sm-4 apply-discount">
                            <button @click.prevent="applyDiscount()" class="btn outline small">Apply</button>
                        </div>
                        <div class="col-sm-12">
                            <p class="error" v-if="discountError !== ''">{{discountError}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <p class="error" v-if="paymentError !== ''">{{paymentError}}</p>
                </div>
            </div>
            </form>

            <h4>3. Upload Your Video</h4>
            <div class="row">
                <div class="col-sm-6">
                    <file-upload
                        class="btn black small video"
                        v-model="video"
                        post-action="/api/video"
                        @input="upload(video)"
                        ref="videoUpload"
                    >
                    Choose your video
                    </file-upload>
                    <label v-if="video.length === 0">.mp4 or .mov (Song synced to the video)</label>
                    <div v-if="video.length !== 0">
                        <label class="truncate upload-asset-details">
                            {{ video[0].name }}<br/><br/>
                            <span v-if="video[0].progress === '0.00'">Ready to upload</span>
                            <span v-if="video[0].progress !== '0.00'">Progress: {{ Math.round(video[0].progress) }}%</span><br/>
                        </label>
                        <div class="progress">
                            <div 
                                class="progress-bar" 
                                role="progressbar"
                                :aria-valuenow="video[0].progress" 
                                aria-valuemin="0" 
                                aria-valuemax="100" 
                                style="width: 60%;"
                                :style="{width: video[0].progress + '%'}"
                            >
                            </div>
                        </div>
                        <p class="error" v-if="video[0].error">Error: {{ video[0].error }}</p>
                        <p v-if="video[0].success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> We've received your video.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <p class="success" v-if="success">Thank you for your entry. Please leave your browser window open while the upload completes. Once it's completed, you can close your browser window.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <button class="btn red large" v-if="!saving" @click.prevent="submitEntry()">Upload My Entry</button>
                    <div class="saving" v-if="saving"><div class="spinner"></div></div>
                    <p class="error" v-if="error">{{error}}</p>
                </div>
            </div>
        </div>

        <div class="background" v-on:click="hide()" v-if="show"></div>
    </div>
</template>

<script>
    var FileUpload = require('vue-upload-component');

    export default {

        props: ['url'],

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
