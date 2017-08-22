<template>
    <div class="upload">
        <div class="trigger" v-on:click="show=!show">
            <img src="/images/upload.png" alt="Upload your track">
            <button class="btn small black">Upload your track</button>
        </div>


        <div class="overlay" v-if="show">
            <h4>1. Your Email Address.</h4>
            <form method="POST" action="/api/user/upload" @submit.prevent="pay()">
            <div class="row">
                <div class="col-sm-6">
                    <input class="textbox" type="email" name="email" id="email" v-model="form.email" />
                    <p class="error" v-if="errors.email !== ''">{{errors.email}}</p>
                </div> 
                <div class="col-sm-6">
                    <p>If you have not registered yet, you can do so <a href="#">here</a></p>
                </div>
            </div>
            

            <h4>2. Payment.</h4>
            <div class="row">
                <div class="col-sm-6">
                    <button class="btn black small btn-block">Pay Entry Fee</button>
                </div>
                <div class="col-sm-6">
                    <p v-if="payed">Payed</p>
                </div>
            </div>
            </form>

            <h4>3. Upload.</h4>
            <div class="row">
                <div class="col-sm-6">
                    <file-upload
                        class="btn black small song"
                        v-model="song"
                        post-action="/api/song"
                        @input="upload(song)"
                        ref="songUpload"
                    >
                    Upload Song
                    </file-upload>
                    <label v-if="song.length === 0">.aiff or .mp3 (Song only)</label>
                    <div v-if="song.length !== 0">
                        <label class="truncate">
                            {{ song[0].name }}<br/>
                            <span v-if="song[0].progress === '0.00'">Ready</span>
                            <span v-if="song[0].progress !== '0.00'">Progress: {{ Math.round(song[0].progress) }}%</span><br/>
                        </label>
                        <div class="progress">
                            <div 
                                class="progress-bar" 
                                role="progressbar"
                                :aria-valuenow="song[0].progress" 
                                aria-valuemin="0" 
                                aria-valuemax="100" 
                                style="width: 60%;"
                                :style="{width: song[0].progress + '%'}"
                            >
                            </div>
                        </div>
                        <p class="error" v-if="song[0].error">Error: {{ song[0].error }}</p>
                        <p v-if="song[0].success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> We've received your song.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <file-upload
                        class="btn black small video"
                        v-model="video"
                        post-action="/api/video"
                        @input="upload(video)"
                        ref="videoUpload"
                    >
                    Upload Video
                    </file-upload>
                    <label v-if="video.length === 0">.mp4 or .mov (Song synced to the video)</label>
                    <div v-if="video.length !== 0">
                        <label class="truncate">
                            {{ video[0].name }}<br/>
                            <span v-if="video[0].progress === '0.00'">Ready</span>
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
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <button class="btn red large" v-if="!saving" @click.prevent="submit()">Upload My Entry</button>
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
    // s70FFeh1L1

    export default {

        data: function() {
            return {
                show: true,
                saving: false,
                tooltip: false,

                loggedIn: false,
                payed: false,
                userId: '',

                error: '',
                song: [],
                video: [],
                form: {
                    email: '',
                    code: '',
                },
                errors: {
                    email: '',
                    code: '',
                },
            };
        },

        components: {
            FileUpload: FileUpload
        },

        computed: {

        },

        methods: {
            hide: function() {
                this.show = false
            },

            toggleTooltip: function() {
                this.tooltip = !this.tooltip
            },

            pay: function() {
                axios.post('api/user/check', this.form)
                    .then(response => {
                        this.loggedIn = true;
                        this.error = false;

                        this.userId = response.data.id;

                        this.payed = true;
                    })
                    .catch(error => {
                        this.errors.email = error.response.data.email[0];
                    });
            },

            submit: function() {
                if(!this.payed) {
                    this.error = 'You must pay your entrance fee before you can submit your entry.';
                    return;
                }

                if(this.song.length > 0) {
                    this.$refs.songUpload.active = true
                }

                if(this.video.length > 0) {
                    this.$refs.videoUpload.active = true
                }

                // this.saving = true;
            },

            upload: function(asset) {
                asset[0].data = {
                    'id': this.userId,
                    'filename': asset[0].name,
                };
            }
        }
    }
    // s70FFeh1L1
</script>
