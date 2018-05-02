<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/swiper.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/magnific-popup.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('welcome/css/responsive.css') }}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/navigation.css') }}">


    <!-- Document Title
    ============================================= -->
    <title>Slionx | The Multi-Purpose HTML5 Template</title>
    <style>
        .video-slider-play {
            position: absolute;
            left: 45%;
            top: auto;
            bottom: 40px;
            margin-left: -24px;
            width: 48px;
            height: 48px;
            line-height: 48px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.2);
            color: #FFF;
            font-size: 18px;
            text-align: center;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
        }

        .video-slider-play i:nth-of-type(1) {
            position: relative;
            left: 2px;
        }

        .video-slider-play i:nth-of-type(2),
        .video-slider-play.video-played i:nth-of-type(1) { display: none; }

        .video-slider-play.video-played i:nth-of-type(2) { display: block; }

        .video-slider-volume {
            position: absolute;
            left: 55%;
            top: auto;
            bottom: 40px;
            margin-left: -24px;
            width: 48px;
            height: 48px;
            line-height: 48px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.2);
            color: #FFF;
            font-size: 18px;
            text-align: center;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
        }

        .video-slider-volume i:nth-of-type(1) {
            position: relative;
            left: 2px;
        }

        .video-slider-volume i:nth-of-type(2),
        .video-slider-volume.video-played i:nth-of-type(1) { display: none; }

        .video-slider-volume.video-played i:nth-of-type(2) { display: block; }


        .revo-slider-emphasis-text {
            font-size: 64px;
            font-weight: 700;
            letter-spacing: -1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }
        .tp-video-play-button { display: none !important; }

        .tp-caption { white-space: nowrap; }

    </style>
</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    @include('desktop.layouts.header')

    <section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
        <div class="slider-parallax-inner">
            @if(Cache::get('welcomeType') == 'slide1')
            <div class="tp-banner-container">
                <div class="tp-banner" >
                    <ul>    <!-- SLIDE  -->
                        <li class="dark" data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="{{ asset('welcome/images/5.jpg') }}" data-delay="10000"  data-saveperformance="off" data-title="Responsive Design">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('welcome/images/5.jpg') }}"  alt="kenburns1"  data-bgposition="center bottom" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scale="100" data-scaleend="120" data-bgpositionend="center top">
                            <!-- LAYERS -->

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                                 data-x="355"
                                 data-y="215"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1000"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; white-space: nowrap;">Picture Perfect on Every Device Bcoz</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                                 data-x="200"
                                 data-y="230"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1200"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; white-space: nowrap;">It's Completely Responsive</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text"
                                 data-x="245"
                                 data-y="340"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1400"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; max-width: 650px; white-space: normal;">We have created a Design that looks Awesome, performs Brilliantly &amp; senses Orientations.</div>

                            <div class="tp-caption customin ltl tp-resizeme"
                                 data-x="496"
                                 data-y="450"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1550"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3;"><a href="#" class="button button-border button-white button-light button-large button-rounded tright nomargin"><span>Start Tour</span> <i class="icon-angle-right"></i></a></div>

                        </li>

                        <li class="dark" data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="{{ asset('welcome/images/6.jpg') }}" data-delay="10000"  data-saveperformance="off"  data-title="Unlimited Possibilities">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('welcome/images/6.jpg') }}"  alt="kenburns6"  data-bgposition="center bottom" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scale="100" data-scaleend="120" data-bgpositionend="center top">
                            <!-- LAYERS -->

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                                 data-x="453"
                                 data-y="215"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1000"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Why Choose Canvas?</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                                 data-x="264"
                                 data-y="230"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1200"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Unlimited Possibilities</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text"
                                 data-x="245"
                                 data-y="340"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1400"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; max-width: 650px; white-space: normal;">Create whatever you require for your Business to bloom with Tons of Customization Possibilities.</div>

                            <div class="tp-caption customin ltl tp-resizeme"
                                 data-x="508"
                                 data-y="450"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1550"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3;"><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>Browse</span><i class="icon-angle-right"></i></a></div>

                        </li>

                        <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-thumb="{{ asset('welcome/images/7.jpg') }}" data-delay="10000"  data-saveperformance="off"  data-title="Unlimited Possibilities">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('welcome/images/7.jpg') }}"  alt="kenburns6"  data-bgposition="center bottom" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scale="100" data-scaleend="120" data-bgpositionend="center top">
                            <!-- LAYERS -->

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                                 data-x="453"
                                 data-y="215"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1000"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Why Choose Canvas?</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                                 data-x="264"
                                 data-y="230"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1200"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Unlimited Possibilities</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text"
                                 data-x="245"
                                 data-y="340"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1400"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; max-width: 650px; white-space: normal;">Create whatever you require for your Business to bloom with Tons of Customization Possibilities.</div>

                            <div class="tp-caption customin ltl tp-resizeme"
                                 data-x="508"
                                 data-y="450"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1550"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3;"><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>Browse</span><i class="icon-angle-right"></i></a></div>

                        </li>

                        <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-thumb="{{ asset('welcome/images/8.jpg') }}" data-delay="10000"  data-saveperformance="off"  data-title="Unlimited Possibilities">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('welcome/images/8.jpg') }}"  alt="kenburns6"  data-bgposition="center bottom" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scale="100" data-scaleend="120" data-bgpositionend="center top">
                            <!-- LAYERS -->

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                                 data-x="453"
                                 data-y="215"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1000"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Why Choose Canvas?</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                                 data-x="264"
                                 data-y="230"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1200"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Unlimited Possibilities</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text"
                                 data-x="245"
                                 data-y="340"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1400"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; max-width: 650px; white-space: normal;">Create whatever you require for your Business to bloom with Tons of Customization Possibilities.</div>

                            <div class="tp-caption customin ltl tp-resizeme"
                                 data-x="508"
                                 data-y="450"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1550"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3;"><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>Browse</span><i class="icon-angle-right"></i></a></div>

                        </li>
                    </ul>
                </div>
            </div><!-- END REVOLUTION SLIDER -->
        @else



            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide dark" style="background-image: url('{{ asset('welcome/images/7.jpg') }}');">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp">Welcome to Slionx</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">Create just what you need for your Perfect Website. Choose from a wide range of Elements &amp; simply put them on your own Canvas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp"></h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200"></p>
                            </div>
                            <a class="video-slider-play" href="#"><i class="icon-line-play"></i><i class="icon-line-pause"></i></a>
                            <a class="video-slider-volume" href="#"><i class="icon-line-volume"></i><i class="icon-line2-volume-off"></i></a>
                        </div>
                        <div class="video-wrap">
                            <video class="slide-video" poster="" preload="auto" loop>
                               {{-- <source src='images/videos/explore.webm' type='video/webm' />--}}
                                <source src='{{ asset('welcome/mp4/Gareth Emery feat. Christina Novelli - Dynamite (Official Video).webm') }}' type='video/mp4' />
                            </video>
                            <div class="video-overlay" style="/*background-color: rgba(0,0,0,0.55);*/"></div>
                        </div>
                    </div>

                    <div class="swiper-slide dark">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp" id="title">Beautifully Flexible Mp4</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
                            </div>
                            <a class="video-slider-play" href="#" ><i class="icon-line-play"></i><i class="icon-line-pause"></i></a>
                            <a class="video-slider-volume" href="#" ><i class="icon-line-volume"></i><i class="icon-line2-volume-off"></i></a>
                        </div>
                        <div class="video-wrap">
                            <video class="slide-video" poster="" preload="auto" loop>
                                {{--<source src='images/videos/explore.webm' type='video/webm' />--}}
                                <source src='{{ asset('welcome/mp4/Capital Letters.mp4') }}' type='video/mp4' />
                            </video>
                            <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
                        </div>
                    </div>

                    <div class="swiper-slide" style="background-image: url('{{ asset('welcome/images/5.jpg') }}'); background-position: center top;">
                        <div class="container clearfix">
                            <div class="slider-caption">
                                <h2 data-caption-animate="fadeInUp">Great Performance</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
                <div id="slide-number"><div id="slide-number-current"></div><span>/</span><div id="slide-number-total"></div></div>
                <div class="swiper-pagination"></div>
            </div>
        @endif

            <!--<a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>-->

        </div>
    </section>

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row clearfix">
                    <div class="col-lg-5">
                        <div class="heading-block topmargin">
                            <h1>Welcome to Canvas.<br>MultiPurpose Template.</h1>
                        </div>
                        <p class="lead">Create a website that you are gonna be proud of. Be it Business, Portfolio, Agency, Photography, eCommerce &amp; much more.</p>
                    </div>
                    <div class="col-lg-7">
                        <div style="position: relative; margin-bottom: -60px;" class="ohidden" data-height-lg="426" data-height-md="567" data-height-sm="470" data-height-xs="287" data-height-xxs="183">
                            <img src="" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="100" alt="Chrome">
                            <img src="" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="400" alt="iPad">
                        </div>
                    </div>
                </div>
            </div>
    </section><!-- #content end -->
    <!-- Footer ============================================= -->
    <footer id="footer" class="dark">
        <!-- Copyrights ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Copyrights &copy; 2018 All Rights Reserved by Slionx Inc.<br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-vimeo">
                            <i class="icon-vimeo"></i>
                            <i class="icon-vimeo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-yahoo">
                            <i class="icon-yahoo"></i>
                            <i class="icon-yahoo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>

                    <div class="clear"></div>

                    <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="{{ asset('welcome/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/plugins.js') }}"></script>
<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{ asset('welcome/js/functions.js') }}"></script>

<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
<script type="text/javascript" src="{{ asset('welcome/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/jquery.themepunch.revolution.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.parallax.min.js') }}"></script>


<script type="text/javascript" src="{{ asset('welcome/js/typing.js') }}"></script>
<script>

    jQuery('.video-slider-play').on('click', function(e){
       e.preventDefault();
        if( jQuery(this).hasClass('video-played') ) {
            jQuery(this).parent().parent().find('.slide-video').get(0).play();
        } else {
            jQuery(this).parent().parent().find('.slide-video').get(0).pause();
        }
        jQuery(this).toggleClass('video-played');
    });

    jQuery('.video-slider-volume').on('click', function(e){
        e.preventDefault();
        if( jQuery(this).hasClass('video-played') ) {
            jQuery(this).parent().parent().find('.slide-video').get(0).muted  = false;
        } else {
            jQuery(this).parent().parent().find('.slide-video').get(0).muted  = true;
        }
        jQuery(this).toggleClass('video-played');
    });

    var app = document.getElementById('title');
    var typewriter = new Typewriter(app, {
        loop: true,
        cursor:'_'
    });
    typewriter.pauseFor(500)
        .typeString('Slionx')
        .pauseFor(2500)
        .deleteAll()
        .typeString('The quieter you become')
        .pauseFor(1500)
        .deleteChars(19)
        .typeString(' more you are able to hear!')
        .pauseFor(1500)
        .start();
</script>

<script type="text/javascript">

    var tpj=jQuery;
    tpj.noConflict();

    tpj(document).ready(function() {

        var apiRevoSlider = tpj('.tp-banner').show().revolution(
            {
                sliderType:"standard",
                jsFileLocation:"include/rs-plugin/js/",
                dottedOverlay:"none",
                delay:16000,
                startwidth:1140,
                startheight:600,
                hideThumbs:200,

                thumbWidth:100,
                thumbHeight:50,
                thumbAmount:5,

                navigation: {
                    keyboardNavigation: "on",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "hades",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: false,
                        tmp: '<div class="tp-arr-allwrapper">	<div class="tp-arr-imgholder"></div></div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        }
                    },
                },

                touchenabled:"on",
                onHoverStop:"on",

                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,

                parallax:"mouse",
                parallaxBgFreeze:"on",
                parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

                keyboardNavigation:"off",

                navigationHAlign:"center",
                navigationVAlign:"bottom",
                navigationHOffset:0,
                navigationVOffset:20,

                soloArrowLeftHalign:"left",
                soloArrowLeftValign:"center",
                soloArrowLeftHOffset:20,
                soloArrowLeftVOffset:0,

                soloArrowRightHalign:"right",
                soloArrowRightValign:"center",
                soloArrowRightHOffset:20,
                soloArrowRightVOffset:0,

                shadow:0,
                fullWidth:"off",
                fullScreen:"on",

                spinner:"spinner4",

                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,

                shuffle:"off",

                autoHeight:"off",
                forceFullWidth:"off",



                hideThumbsOnMobile:"off",
                hideNavDelayOnMobile:1500,
                hideBulletsOnMobile:"off",
                hideArrowsOnMobile:"off",
                hideThumbsUnderResolution:0,

                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                startWithSlide:0,
            });

        apiRevoSlider.bind("revolution.slide.onloaded",function (e) {
            setTimeout( function(){ SEMICOLON.slider.sliderParallaxDimensions(); }, 200 );
        });

        apiRevoSlider.bind("revolution.slide.onchange",function (e,data) {
            SEMICOLON.slider.revolutionSliderMenu();
        });

    }); //ready

</script>
</body>
</html>