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
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem porro, corrupti commodi totam doloremque exercitationem facere ipsam, aspernatur accusamus officia voluptatibus ad culpa saepe ratione! Est reiciendis ducimus quibusdam impedit.</p>
                        <p>Iste saepe a delectus eum, assumenda iusto porro cum deleniti, laborum ullam beatae alias, ipsum impedit repellendus necessitatibus quasi illo. Enim minus rerum vero at dolores accusamus aperiam eum soluta.</p>
                        <p>Non error tenetur, quos vel optio quibusdam a nemo ut aut, asperiores dolores sapiente et sint iste, natus tempore deserunt mollitia. Itaque nam reprehenderit quod ad, consequatur voluptatem suscipit. Voluptatibus.</p>
                        <p>Molestias ab voluptate iste placeat magnam numquam hic soluta dicta eius deserunt recusandae praesentium sunt alias nam officiis natus rem quae voluptatibus nemo accusamus, error in nostrum animi. Repellat, officia!</p>
                        <p>Delectus perferendis ea laboriosam molestiae. Repellat ad, soluta natus incidunt saepe totam fugit doloribus eligendi numquam expedita quis facilis error. Iusto quae enim nihil recusandae quis, vero odio voluptas aliquid.</p>
                        <p>Iusto, fugiat, facere. Nihil fugit fuga magnam commodi autem nesciunt assumenda architecto perspiciatis beatae vel provident, eaque maiores labore adipisci harum corporis modi quis ipsam! Nisi atque fuga velit ipsam.</p>
                        <p>Accusantium, libero molestiae minus. Totam minus dolorem, inventore impedit ipsum laborum accusamus eum distinctio molestias sint aliquid pariatur dolore libero maxime quae praesentium eveniet ex soluta fuga, tempore, quas amet.</p>
                        <p>In hic, laboriosam quis totam labore est, perspiciatis. Dolore aperiam quas adipisci commodi at magni, dolor, facilis nulla saepe accusamus mollitia cum totam quae a voluptatem molestias autem, ut nobis.</p>
                        <p>Necessitatibus odio at consectetur qui sunt omnis, nemo maiores. Numquam, quibusdam, asperiores ut, ullam fugiat veritatis corrupti ipsam iusto dolorum, sit officia nostrum! Sed vel odio labore a, placeat reprehenderit.</p>
                        <p>Nam debitis, molestias neque maiores numquam animi ab, distinctio, expedita officiis dolor labore ex! Tempora, est corporis modi iusto quam ullam sint suscipit quidem facere. Aperiam ipsum excepturi modi aliquam.</p>
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
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kfVsfOSbJY0?rel=0&amp;showinfo=0?ecver=1" frameborder="0" allowfullscreen></iframe>
                </div>
                <a href="/video/thisIsTheVideoFile.txt" class="btn red large" download>Download Video</a>
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

        computed: {

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
