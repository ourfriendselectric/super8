@extends('layouts.app')

@section('content')

    <div class="content">

        <div class="winner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1>2018 Winner</h1>
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="/images/2018/post/tandem_circuit.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="col-sm-9">
                                <h2>Tandem Circuit</h2>
                                <p>Tandem Circuit is the solo project of Sydney-based songwriter/producer Tim Curtin. Growing up in Coffs Harbour, Tim drew inspiration from his dad's diverse music collection, where he began developing a feel for the 'textures' of sounds. This 'texture-based' approach to songwriting and production allows him to create songs that are uniquely immersive and evocative.</p>
                            </div>
                        </div>
                        <div class="row video">
                            <div class="col-xs-12">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="details">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <img src="/images/lightning.png" alt="" class="lightning">
                        <h1>What is Super 8</h1>
                        <p>Super 8 is a music based composition, competition.<br/>Rolls off the tongue doesn’t it.</p>
                        <p>In 2017 we recorded a music video with no sound and put the challenge out there for
                        Australian artists to write and record a track based around the video.</p>
                        <p>Entrants then had to track their original song to the video and submit it via our site.</p>
                        <p>Four finalists and four runners up were selected for a showcase event hosted by KLP
                        with the finalists battling it out with live performances played to the video.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="details alt">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <img src="/images/lightning.png" alt="" class="lightning">
                        <h1>The Judges</h1>
                        <div class="row profiles">
                            <div class="profile">
                                <img src="images/2018/post/joel_farland.jpg" alt="">
                                <h3>Joel Farland</h3>
                            </div>
                            <div class="profile">
                                <img src="images/2018/post/mark_callaghan.jpg" alt="">
                                <h3>Mark Callaghan</h3>
                            </div>
                            <div class="profile">
                                <img src="images/2018/post/steve_balbi.jpg" alt="">
                                <h3>Steve Balbi</h3>
                            </div>
                            <div class="profile">
                                <img src="images/2018/post/stav_yiannoukas.jpg" alt="">
                                <h3>Stav Yiannoukas</h3>
                            </div>
                            <div class="profile">
                                <img src="images/2018/post/emily_collins.jpg" alt="">
                                <h3>Emily Collins</h3>
                            </div>
                            <div class="profile">
                                <img src="images/2018/post/karl_cashwell.jpg" alt="">
                                <h3>Karl Cashwell</h3>
                            </div>
                            <div class="profile">
                                <img src="images/2018/post/klp.jpg" alt="">
                                <h3>KLP (Host)</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="details">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <img src="/images/lightning.png" alt="" class="lightning">
                        <h1>The Prize</h1>
                        <p>$2000 cash!<br />
                        The music video - yours to keep no strings attached<br />
                        Your next EP, Single or Album designed by the Our Friends Electric Creative Studio<br />
                        Two days in a recording studio with Karl Cash to get your next EP, Single or Album underway!<br />
                        A Promo Photoshoot</p>
{{--                         <div class="row">
                            <img src="/images/download.png" alt="Watch" class="icon" />
                        </div> --}}
                        <Register />
                        {{-- <a href="#" class="register">Register Your Details For Super 8 2019</a> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="details alt">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <img src="/images/lightning.png" alt="" class="lightning">
                        <h1>2018 Finalists</h1>
                        <div class="row finalists">
                            <div class="col-sm-6 finalist">
                                <img src="/images/2018/post/lost_in_china.jpg" alt="">
                                <h3>Lost In China</h3>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8"></iframe>
                                </div>
                            </div>
                            <div class="col-sm-6 finalist">
                                <img src="/images/2018/post/truth_ridge.jpg" alt="">
                                <h3>Truth Ridge</h3>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8"></iframe>
                                </div>
                            </div>
                            <div class="col-sm-6 col-sm-offset-3 finalist">
                                <img src="/images/2018/post/feb774.jpg" alt="">
                                <h3>FEB774 (Highly Commended)</h3>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="details">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <img src="/images/lightning.png" alt="" class="lightning">
                        <h1>Runners Up</h1>
                        <div class="row profiles">
                            <div class="profile">
                                <img src="/images/2018/post/phil_shaw.jpg" alt="">
                                <h3>Phil Shaw</h3>
                            </div>
                            <div class="profile">
                                <img src="/images/2018/post/loso.jpg" alt="">
                                <h3>Lo$o</h3>
                            </div>
                            <div class="profile">
                                <img src="/images/2018/post/secret_songs.jpg" alt="">
                                <h3>Secret Songs</h3>
                            </div>
                            <div class="profile">
                                <img src="/images/2018/post/francis_byrne.jpg" alt="">
                                <h3>Francis Byrne</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="details alt">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <img src="/images/lightning.png" alt="" class="lightning">
                        <div class="row socials">
                            <p class="h1">FOLLOW US ON INSTAGRAM @SUPER8MUSICVIDEO</p>
                            <a href="http://www.ourfriendselectric.com.au" target="_blank">
                                <img src="http://via.placeholder.com/100x100" alt="">
                            </a>
                            <a href="http://apraamcos.com.au/" target="_blank">
                                <img src="http://via.placeholder.com/100x100" alt="">
                            </a>
                            <a href="https://www.younghenrys.com/" target="_blank">
                                <img src="http://via.placeholder.com/100x100" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

