@extends('layouts.app')

@section('content')

    <div class="content">
        
        <Hero 
            url="{{ env('APP_URL') }}"
            paypal="{{ env('PAYPAL_URL') }}"
        ></Hero>

        <div class="banner">

            <div class="rotate">
                <div class="dates">
                    <span class="title">Entries Now Open</span> <span class="date">Deadline January 15<sup>th</sup></span>
                </div>
            </div>

            <div class="fill"></div>

        </div>

        <div class="details">
            <section class="what">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <img src="/images/lightning.png" alt="" class="lightning">
                            <h2>What is Super 8</h2>
                            <p>Super 8 is a music based composition, competition.</p>
                            <p>Rolls off the tongue doesn’t it.</p>
                            <p>So what are we on about?</p>
                            <p>We have recorded a video for you to create the music for. You then get to keep it if you win.</p>
                            <p>It’s pretty simple and the prize pool is awesome.</p>
                            <p>No matter how you play, who you play with or the genre you dig you’re eligible. Basically we’re after anyone who can create an original piece of music while being mindful that it complements the video we’ve shot.</p>
                            <p>Super 8 culminates with a live event experience with the short-listed finalists either playing live to the video on the night or, if based on your musical approach and output you can’t perform live, a playback in front of a panel of esteemed industry judges. The event will take place at one of Sydney’s leading independent music venues in Feb 2018.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="rules">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <img src="/images/lightning.png" alt="" class="lightning">
                            <h2>The Rules</h2>
                            <p>Your song must be an original composition and not be available publicly to listen to or download until the day after the live final.</p>
                            <p>As a result it cannot have been entered into another competition prior to Super 8.<br/>
                            Please mix, master and sync your song to the video prior to upload.<br/>
                            Super 8 is open to Australian Citizens and Permanent Residents.<br/>
                            Please see the full list of terms of conditions via the link below.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="how">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <img src="/images/lightning.png" alt="" class="lightning">
                            <h2>How To Enter</h2>
                            <p>Register &amp; download a copy of the music video via the link at the top of the page.<p>
                            <p>Sync your track to the Super 8 Music Video</p>
                            <p>Upload a copy of your video via the website in either MOV of MP4 format. We don’t need massive files, so don’t worry if it's not the best video quality on upload. If you are selected as a finalist we will be in touch and we can get the hi res version then.</p>
                            <p>There is a one off entry fee of $55 per song entered with a discount for APRA members.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="prizes">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <img src="/images/lightning.png" alt="" class="lightning">
                            <h2>Judges &amp; Prizes</h2>
                            <p>1. Perform Live at Super 8<br/>
                            2. The music video - yours to keep no strings attached<br/>
                            3. Your next EP, Single or Album designed by the Our Friends Electric Creative Studio - this includes designs for merchandise and your branding - again yours to keep no strings attached<br/>
                            4. Two days in a recording studio to get your next EP, Single or Album underway!<br/>
                            5. Two days of Mixing, Mastering or Recording with one of our judges<br/>
                            7. Promo Photoshoot <br/>
                            6. $2000 cash!<br/></p>
                            <p>Stay tuned for the Judges Announcement. Sign up to our mailing list &amp; follow us on Facebook &amp; Instagram for updates.</p>
                        </div>
                    </div>
                    <div class="row logos">
                        <div class="col-md-10 col-md-offset-1">
                            <a href="http://ourfriendselectric.com.au" target="_blank" class="logo">
                                <img class="ofe" src="/images/logos/ofe.png" />
                                <p>Foundation Partner</p>
                            </a>
                            <a href="http://apraamcos.com.au/" target="_blank" class="logo">
                                <img class="apra" src="/images/logos/apra.png" />
                                <p>Supporting Partner</p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

@endsection

