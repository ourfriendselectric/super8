@extends('layouts.app')

@section('content')

    <div class="content">
        
        <header>
            <div class="logo">
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
                        <Upload url="{{ env('APP_URL') }}" />
                    </div>
                </div>
            </div>
        </header>

        <div class="banner">

            <div class="rotate">
                <div class="dates">
                    <span class="title">Video Available 20.06.2017</span> <span class="date">Deadline 03.07.2017</span>
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
                            <p>Super 8 is music competition open to bands, composers, songwriters, bedroom producers - basically anyone who can create an origianl piece of music.</p>
                            <p>We have recorded a music video for your copmposition to be written and tracked to. Your entry will be judged not only on how good the tune is, however also on how well the song compliments the video and the story within.</p>
                            <p>The comp culminates with a live awards and performance evening at Sydney's Oxford Art Factory where the top, or 'Super' 8  nalists perform their tracks to a panel of industry heavy weights including artists, producers, sound engineers and label heads.</p>
                            <p>The comp is split into two categories, 'performance' and 'non performance'. Basically if you need a 24 piece orchestra to perform your track, or have electronically created a bunch of samples featuring a sped up humming bird or the sound of a catepillar crying you  t into the 'non performance' category.</p>
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
                            <p>Your song must be an original composition.<br>
                            It cannot have been entered in another competition previously or used commercially.<br>
                            If you have written and recorded a song but not yet released it, this is your perfect opportunity!</p>
                            <p>This competition is about composing a piece of music to match a video.</p>
                            <p>Your composition must tell the story of the video. It must also be mixed, mastered &amp; synced to the video.</p>
                            Super 8 is open to Australian Citizens &amp; Permanent Residence.</p>
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
                            <p>Register &amp; download a copy of our music video - available at the top of this page.</p>
                            <p>Once your track is ready, upload a copy in the required file formats, select if your track can or cannot be performed live and you are good to go.</p>
                            <p>There is a one off entry fee of $50 per song entered.</p>
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
                            <p>Stay tuned. Sign up to our mailing list &amp; follow us on facebook &amp; instagram for announcements.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

    <footer>
        <div class="container">
            <div class="row social">
                <a href="#"><img src="/images/email.png" alt="Email"></a>
                <a href="#"><img src="/images/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="/images/instagram.png" alt="Instagram"></a>
            </div>
            <div class="row">
                <a href="#">terms &amp; conditions</a> &#124; <a href="#">join our mailing list</a> &#124; <a href="#">contact us</a>
            </div>
        </div>
    </footer>

@endsection

