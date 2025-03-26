<!DOCTYPE html>
<html lang="tr">
<head>
    <link href="{{ asset("image/setting/")."/".\App\Models\setting::getSetting("icon") }}" rel="icon">
    <title>{{ \App\Models\setting::getSetting("title") }}</title>
    <meta name="format-detection" content="telephone={{ \App\Models\setting::getSetting("phoneNumber") }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ \App\Models\setting::getSetting("description") }}"/>
    <meta http-equiv="cache-control" content="public"/>
    <meta name="copyright" content="{{ \App\Models\setting::getSetting("siteUrl") }}"/>
    <meta name="author" content="{{ \App\Models\setting::getSetting("author") }}"/>
    <meta name="distribution" content="Global"/>
    <meta name="robots" content="INDEX,FOLLOW"/>


    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ \App\Models\setting::getSetting("siteUrl") }}"/>
    <meta property="og:image"
          content="{{ asset("image/setting/")."/".\App\Models\setting::getSetting("logoHeader") }}"/>
    <meta property="og:site_name" content="{{ \App\Models\setting::getSetting("title") }}"/>
    <meta property="og:description" content="{{ \App\Models\setting::getSetting("description") }}"/>
    <meta property="og:locale" content="tr_TR"/>
    <meta property="og:title" content="{{ \App\Models\setting::getSetting("title") }}"/>

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ \App\Models\setting::getSetting("siteUrl") }}">
    <meta property="twitter:title" content="{{ \App\Models\setting::getSetting("title") }}">
    <meta property="twitter:description" content="{{ \App\Models\setting::getSetting("description") }}">
    <meta property="twitter:image"
          content="{{ asset("image/setting/")."/".\App\Models\setting::getSetting("logoHeader") }}">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&amp;display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset("asset/front/vendors/bootstrap/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/bootstrap-select/bootstrap-select.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/animate/animate.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/fontawesome/css/all.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/icofont/icofont.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/jquery-ui/jquery-ui.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/jarallax/jarallax.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/jquery-magnific-popup/jquery.magnific-popup.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/nouislider/nouislider.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/nouislider/nouislider.pips.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/tiny-slider/tiny-slider.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/tolak-icons-two/style.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/tolak-icons/style.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/owl-carousel/css/owl.carousel.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/vendors/owl-carousel/css/owl.theme.default.min.css") }}"/>

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset("asset/front/css/tolak.css") }}"/>
    <link rel="stylesheet" href="{{ asset("asset/front/css/tolak-color-1.css") }}"/>
</head>
<body class="custom-cursor">

<div class="custom-cursor__cursor"></div>
<div class="custom-cursor__cursor-two"></div>

<div class="preloader">
    <div class="preloader__image" style="background-image: url({{ asset("asset/front//images/loader.png") }});"></div>
</div>
<!-- /.preloader -->
<div class="page-wrapper">
    <div class="topbar-five">
        <div class="container">
            <div class="topbar-five__inner">
                <div class="topbar-five__info">
                    <div class="topbar-five__info__icon"><i class="tolak-icons-two-global-solution"></i></div> Adres: {{ \App\Models\setting::getSetting("address") }}
                </div><!-- /.topbar-five__info -->
                <div class="topbar-five__right">
                    <div class="topbar-five__language">
                        <a href="#"><img src="{{ asset("asset/front/turkish.png") }}"
                                         alt="tolak"/>Türkçe</a>
                        <div class="topbar-five__language__dropdown">
                            <a href="{{ route("indexHtmlTR") }}"><img src="{{ asset("asset/front/turkish.png") }}" alt="tolak"/>Turkish</a>
                            <a href="{{ route("indexHtmlEN") }}"><img src="{{ asset("asset/front/images/shapes/flag.png") }}" alt="tolak"/>English</a>
                        </div>
                    </div><!-- / topbar-five__language -->
                </div><!-- topbar-five__right -->
            </div><!-- /.topbar-five__inner -->
        </div><!-- /.container -->
    </div><!-- /.topbar-five -->

    <header class="main-header-five sticky-header sticky-header--normal">
        <div class="container">
            <div class="main-header-five__inner">
                <div class="main-header-five__logo">
                    <a href="{{ route("indexHtmlTR") }}">
                        <img src="{{ asset("imageAvif/setting/")."/".\App\Models\setting::getSetting("logoHeaderAvif") }}" alt="COLİZO" width="186">
                    </a>
                </div><!-- /.main-header-five__logo -->
                <nav class="main-header-five__nav main-menu">
                    <ul class="main-menu__list">
                        <li>
                            <a href="{{ route("indexHtmlTR") }}">Anasayfa</a>
                        </li>

                        <li class="dropdown">
                            <a href="#">Kurumsal</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route("aboutHtmlTR") }}">Hakkımda</a></li>
                                <li><a href="{{ route("missionHtmlTR") }}">Misyon</a></li>
                                <li><a href="{{ route("visionHtmlTR") }}">Vizyon</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route("productHtmlTR") }}">Ürünler</a>
                        </li>
                        <li>
                            <a href="{{ route("qualityPolicyHtmlTR") }}">Kalite Politikası</a>
                        </li>
                        <li>
                            <a href="{{ route("kvkkHtmlTR") }}">KVKK</a>
                        </li>
                        <li>
                            <a href="{{ route("contactHtmlTR") }}">İletişim</a>
                        </li>
                    </ul>
                </nav><!-- /.main-header-five__nav -->
                <div class="main-header-five__right">
                    <div class="mobile-nav__btn mobile-nav__toggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- /.mobile-nav__toggler -->

                    <a href="{{ route("contactHtmlTR") }}" class="tolak-btn-two main-header-five__btn">
                        <span class="tolak-btn-two__left-star"></span>
                        <span>BİZE YAZIN<i class="tolak-icons-two-arrow-right-short"></i></span>
                        <span class="tolak-btn-two__right-star"></span>
                    </a><!-- /.thm-btn main-header-five__btn -->
                </div><!-- /.main-header-five__right -->
            </div><!-- /.main-header-five__inner -->
        </div><!-- /.container-fluid -->
    </header><!-- /.main-header-five -->
    <!-- main-slider-start -->
