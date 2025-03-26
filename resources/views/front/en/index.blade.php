@extends("layouts.front.en.index")
@section("content")

    @include("layouts.front.en.partial.slider")

    @foreach($category as $categoryWrite)
        @php $product=\App\Models\product::where("categoryId",$categoryWrite->id)->inRandomOrder()->limit(5)->get(); @endphp
        @if(isset($product[0]["id"]))
            <section class="project-three" style="padding-top: 100px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="sec-title-three text-left">

                                <h6 class="sec-title-three__tagline"><span
                                        class="sec-title-three__tagline__left-border"></span>{{ $categoryWrite->nameEnglish }}<span class="sec-title-three__tagline__right-border"></span></h6>
                                <!-- /.sec-title-three__tagline -->

                                <h3 class="sec-title-three__title"> {{ $categoryWrite->nameEnglish }} Products</h3>
                                <!-- /.sec-title-three__title -->
                            </div><!-- /.sec-title-three -->
                        </div>
                        <div class="col-md-4">
                            <div class="project-three__btn">
                                <a href="{{ route("productCategoryHtmlEN",["id"=>$categoryWrite->id,"name"=>$categoryWrite->nameEnglish]) }}" class="tolak-btn-two">
                                    <span class="tolak-btn-two__left-star"></span>
                                    <span>All products<i class="tolak-icons-two-arrow-right-short"></i></span>
                                    <span class="tolak-btn-two__right-star"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="project-three__carousel tolak-owl__carousel tolak-owl__carousel--basic-nav owl-carousel owl-theme"
                        data-owl-options='{
			"items": 1,
			"margin": 30,
			"loop": true,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
			"dots": true,
			"autoplay": true,
			"responsive": {
				"0": {
					"items": 1
				},
				"768": {
					"items": 2
				},
				"992": {
					"items": 3
				}
			}
			}'>
                        @foreach($product as $productWrite)

                            <div class="item">
                                <div class="project-three__item">
                                    <div class="project-three__item__image">
                                        <img src="{{ asset("imageAvif/category/")."/".$categoryWrite->imageAvif }}"
                                             alt="tolak">
                                        <div class="project-three__item__cats">
                                            <a href="{{ route("productCategoryHtmlEN",["id"=>$categoryWrite->id,"name"=>$categoryWrite->nameEnglish]) }}">{{ $categoryWrite->nameEnglish }}</a>
                                        </div>
                                    </div>
                                    <div class="project-three__item__content">
                                        <h3 class="project-three__item__title"><a href="{{ route("productDetailHtmlEN",["id"=>$productWrite->id,"name"=>$productWrite->titleEnglish]) }}">{{ $productWrite->titleEnglish }}</a></h3>
                                        <a href="{{ route("productDetailHtmlEN",["id"=>$productWrite->id,"name"=>$productWrite->titleEnglish]) }}" class="project-three__item__rm"><span
                                                class="tolak-icons-two-arrow-right-short"></span></a>
                                    </div>
                                </div><!-- /.project-three__item -->
                            </div><!-- /.item -->
                        @endforeach


                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section><!-- /.project-three -->
        @endif
    @endforeach

    <!-- CTA Start -->
    <section class="cta-seven" style="background-image: url({{ asset("asset/front/images/shapes/cta-7-bg.png") }});">
        <div class="cta-seven__shape-one"
             style="background-image: url({{ asset("asset/front/images/resources/cta-7-1.png") }});"></div>
        <div class="cta-seven__shape-two"
             style="background-image: url({{ asset("asset/front/images/shapes/cta-7-2.png") }});"></div>
        <div class="cta-seven__shape-three"
             style="background-image: url({{ asset("asset/front/images/shapes/cta-7-3.png") }});"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 wow fadeInLeft" data-wow-delay="00ms">
                    <div class="cta-seven__content">
                        <h2 class="cta-seven__content__title">Reviewing People <br>Means Valuing People.
                        </h2>
                        <ul class="cta-seven__box">
                            <li>
                                <div class="cta-seven__box__icon"><span class="tolak-icons-two-phone-call"></span></div>
                                <h4 class="cta-seven__box__title">contact us</h4>
                                <p class="cta-seven__box__text"><a
                                        href="tel:+90 {{ \App\Models\setting::getSetting("phoneNumber") }}">+90 {{ \App\Models\setting::getSetting("phoneNumber") }}</a>
                                </p>
                            </li>
                            <li>
                                <div class="cta-seven__box__icon"><span class="tolak-icons-two-mail"></span></div>
                                <h4 class="cta-seven__box__title">E-Mail</h4>
                                <p class="cta-seven__box__text"><a
                                        href="mailto:{{ \App\Models\setting::getSetting("email") }}">{{ \App\Models\setting::getSetting("email") }}</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-end wow fadeInUp" data-wow-delay="100ms">
                    <a href="{{ route("contactHtmlEN") }}" class="tolak-btn-two">
                        <span class="tolak-btn-two__left-star"></span>
                        <span>Write Us<i class="tolak-icons-two-arrow-right-short"></i></span>
                        <span class="tolak-btn-two__right-star"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA End -->

    @include("layouts.front.en.partial.faq")

@endsection
