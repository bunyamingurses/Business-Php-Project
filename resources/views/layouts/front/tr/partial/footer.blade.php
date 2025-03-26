<footer class="main-footer-four background-black">
    <div class="main-footer-four__bg background-black"
         style="background-image: url({{ asset("asset/front/images/backgrounds/footer-bg-4-1.jpg") }});"></div>
    <!-- /.main-footer-four__bg -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="footer-widget footer-widget--about-two">
                    <a href="{{ route("indexHtmlTR") }}" class="footer-widget__logo">
                        <img src="{{ asset("imageAvif/setting/")."/".\App\Models\setting::getSetting("logoFooterAvif") }}" width="186" alt="COLİZO">
                    </a>
                    <div class="footer-widget__social">
                        <a href="{{ \App\Models\setting::getSetting("facebook") }}">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <span class="sr-only">Facebook</span>
                        </a>
                        <a href="{{ \App\Models\setting::getSetting("linkedin") }}">
                            <i class="fab fa-linkedin" aria-hidden="true"></i>
                            <span class="sr-only">Linkedin</span>
                        </a>
                        <a href="{{ \App\Models\setting::getSetting("twitter") }}">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            <span class="sr-only">Twitter</span>
                        </a>
                        <a href="{{ \App\Models\setting::getSetting("instagram") }}">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                    </div>
                </div><!-- /.footer-widget -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6 col-lg-3">
                <div class="footer-widget footer-widget--links">
                    <h2 class="footer-widget__title">Hızlı Bağlantılar</h2><!-- /.footer-widget__title -->
                    <ul class="list-unstyled footer-widget__links">
                        <li><a href="{{ route("aboutHtmlTR") }}">Hakkımda</a></li>
                        <li><a href="{{ route("missionHtmlTR") }}">Misyon</a></li>
                        <li><a href="{{ route("visionHtmlTR") }}">Vizyon</a></li>
                        <li><a href="{{ route("qualityPolicyHtmlTR") }}">Kalite Politikası</a></li>
                        <li><a href="{{ route("kvkkHtmlTR") }}">KVKK</a></li>
                    </ul><!-- /.list-unstyled footer-widget__links -->
                </div><!-- /.footer-widget -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6 col-lg-3">
                <div class="footer-widget footer-widget--posts">
                    <h2 class="footer-widget__title">Recent Posts</h2><!-- /.footer-widget__title -->
                    <ul class="footer-widget__posts list-unstyled">
                        @php $productFooter=\App\Models\product::inRandomOrder()->limit(2)->get(); @endphp
                        @foreach($productFooter as $productWrite)
                            <li class="footer-widget__posts__item">
                                <div class="footer-widget__posts__image">
                                    <a href="{{ route("productDetailHtmlTR",["id"=>$productWrite->id,"name"=>$productWrite->title]) }}"><img src="{{ asset("imageAvif/product/")."/".$productWrite->imagesAvif }}" alt="{{ $productWrite->title }}"></a>
                                </div><!-- /.sidebar__posts__image -->
                                <div class="footer-widget__posts__content">
                                    <p class="footer-widget__posts__meta"><i class="icofont-calendar"></i>{{ substr($productWrite->created_at,0,11) }}
                                    </p><!-- /.sidebar__posts__date -->
                                    <h4 class="footer-widget__posts__title"><a href="{{ route("productDetailHtmlTR",["id"=>$productWrite->id,"name"=>$productWrite->title]) }}">{{ $productWrite->title }}</a></h4><!-- /.sidebar__posts__title -->
                                </div><!-- /.sidebar__posts__content -->
                            </li>
                        @endforeach

                    </ul><!-- /.sidebar__posts list-unstyled -->
                </div><!-- /.footer-widget -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <div class="main-footer-four__bottom">
        <div class="container">
            <div class="main-footer-four__bottom__inner">
                <div class="row">
                    <div class="col-md-6">
                        <p class="main-footer-four__copyright">
                            &copy; Copyright <span class="dynamic-year"></span> COLİZO Tüm Hakları Saklıdır.
                        </p>
                    </div>
                    <div class="col-md-6">
                        Designed By: <a href="https://www.gursesyazilim.com">Gürses Yazılım</a>
                    </div>
                </div>
            </div><!-- /.main-footer-four__inner -->
        </div><!-- /.container -->
    </div><!-- /.main-footer-four__bottom -->
</footer><!-- /.main-footer-four -->

</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="{{ route("indexHtmlTR") }}" aria-label="logo image"><img
                    src="{{ asset("imageAvif/setting/")."/".\App\Models\setting::getSetting("logoHeaderAvif") }}" width="155" alt=""/></a>
        </div>
        <li type="none"><a href="{{ route("indexHtmlEN") }}"><img
                    src="{{ asset("asset/front/images/shapes/flag.png") }}" alt="English"/> English</a></li>

        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:{{ \App\Models\setting::getSetting("email") }}">{{ \App\Models\setting::getSetting("email") }}</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:+90 {{ \App\Models\setting::getSetting("phoneNumber") }}">{{ \App\Models\setting::getSetting("phoneNumber") }}</a>
            </li>
            <li>
                {{ \App\Models\setting::getSetting("address") }}
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__social">
            <a href="{{ \App\Models\setting::getSetting("facebook") }}">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                <span class="sr-only">Facebook</span>
            </a>
            <a href="{{ \App\Models\setting::getSetting("linkedin") }}">
                <i class="fab fa-linkedin" aria-hidden="true"></i>
                <span class="sr-only">Linkedin</span>
            </a>
            <a href="{{ \App\Models\setting::getSetting("twitter") }}">
                <i class="fab fa-twitter" aria-hidden="true"></i>
                <span class="sr-only">Twitter</span>
            </a>
            <a href="{{ \App\Models\setting::getSetting("instagram") }}">
                <i class="fab fa-instagram" aria-hidden="true"></i>
                <span class="sr-only">Instagram</span>
            </a>
        </div><!-- /.mobile-nav__social -->
    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->


<a href="#" data-target="html" class="scroll-to-target scroll-to-top">
    <span class="scroll-to-top__text">YUKARI DÖN</span>
    <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
</a>


<script src="{{ asset("asset/front/vendors/jquery/jquery-3.7.0.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/bootstrap-select/bootstrap-select.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/jarallax/jarallax.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/jquery-ui/jquery-ui.js") }}"></script>
<script src="{{ asset("asset/front/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/jquery-appear/jquery.appear.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/jquery-circle-progress/jquery.circle-progress.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/jquery-validate/jquery.validate.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/nouislider/nouislider.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/tiny-slider/tiny-slider.js") }}"></script>
<script src="{{ asset("asset/front/vendors/wnumb/wNumb.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/owl-carousel/js/owl.carousel.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/wow/wow.js") }}"></script>
<script src="{{ asset("asset/front/vendors/tilt/tilt.jquery.js") }}"></script>
<script src="{{ asset("asset/front/vendors/simpleParallax/simpleParallax.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/imagesloaded/imagesloaded.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/isotope/isotope.js") }}"></script>
<script src="{{ asset("asset/front/vendors/countdown/countdown.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/jquery-circleType/jquery.circleType.js") }}"></script>
<script src="{{ asset("asset/front/vendors/jquery-lettering/jquery.lettering.min.js") }}"></script>
<script src="{{ asset("asset/front/vendors/progress-bar/knob.js") }}"></script>

<!-- chart js -->
<script src="{{ asset("asset/front/vendors/chart/chart.js") }}"></script>
<script src="{{ asset("asset/front/vendors/chart/custome-chart.js") }}"></script>

<!-- template js -->
<script src="{{ asset("asset/front/js/tolak.js") }}"></script>
</body>
</html>
