<template>
    <div class="upload">
        <div class="trigger" v-on:click="show=!show">
            <img src="/images/upload.png" alt="Upload your track">
            <button class="btn small black">Upload your track</button>
        </div>


        <div class="overlay" v-if="show">
            <form method="POST" action="/api/user/upload" @submit.prevent="login()">
                <div class="row">
                    <div class="col-sm-6">
                        <input class="textbox" type="text" name="email" id="email" v-model="form.email" />
                        <label for="email">Your email</label>
                        <p class="error" v-if="errors.email !== ''">{{errors.email}}</p>
                    </div> 
                    <div class="col-sm-6">
                        <input class="textbox" type="text" name="code" id="code" v-model="form.code" />
                        <div class="tooltip-container">
                            <label for="code">Registration code</label>
                            <span v-if="tooltip" class="tooltip-content">This is the code we sent to you when you registered.</span>
                            <span class="glyphicon glyphicon-question-sign" 
                                aria-hidden="true" 
                                v-on="{ 
                                    mouseenter: toggleTooltip, 
                                    mouseleave: toggleTooltip }
                                ">
                            </span>
                        </div>
                        <p class="error" v-if="errors.code !== ''">{{errors.code}}</p>
                    </div>

                    <div class="col-sm-12" v-if="!loggedIn">
                        <button class="btn red large" v-if="!saving">Upload My Entry</button>
                        <div class="saving" v-if="saving"><div class="spinner"></div></div>
                        <p v-if="error" class="error">Error.</p>
                    </div>
                </div>
            </form>

            <div class="row" v-if="loggedIn">
                <div class="col-sm-6">
                    <file-upload
                        class="btn red small song"
                        v-model="song"
                        post-action="/api/song"
                        @input="upload(song)"
                    >
                    Upload Song
                    </file-upload>
                    <label v-if="song.length === 0">.aiff or .mp3 (Song only)</label>
                    <div v-if="song.length !== 0">
                        <label class="truncate">
                            {{ song[0].name }}<br/>
                            Progress: {{ Math.round(song[0].progress) }}%<br/>
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
                        class="btn red small video"
                        v-model="video"
                        post-action="/api/video"
                        @input="upload(video)"
                    >
                    Upload Video
                    </file-upload>
                    <label v-if="video.length === 0">.mp4 or .mov (Song synced to the video)</label>
                    <div v-if="video.length !== 0">
                        <label class="truncate">
                            {{ video[0].name }}<br/>
                            Progress: {{ Math.round(video[0].progress) }}%<br/>
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
                show: false,
                saving: false,
                tooltip: false,

                loggedIn: false,
                userId: '',

                error: false,
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

            login: function() {

                this.saving = true;

                axios.post('api/user/code', this.form)
                    .then(response => {
                        this.saving = false;
                        this.loggedIn = true;
                        this.error = false;

                        this.userId = response.data.id;
                    })
                    .catch(error => {
                        this.saving = false;
                        this.error = true;
                        for (var i = error.response.data.length - 1; i >= 0; i--) {
                            // console.log( error.response.data[i]);
                        }
                    });   

            },

            upload: function(song) {
                song[0].active = true;
                song[0].data = {
                    'id': this.userId,
                    'filename': song[0].name,
                };
            }
        }
    }
    // s70FFeh1L1
</script>
