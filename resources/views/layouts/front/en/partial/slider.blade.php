<section class="main-slider-five">
    <div class="main-slider-five__carousel tolak-owl__carousel owl-carousel" data-owl-options='{
		"loop": true,
		"animateOut": "fadeOut",
		"animateIn": "fadeIn",
		"items": 1,
		"autoplay": true,
		"autoplayTimeout": 7000,
		"smartSpeed": 1000,
		"nav": false,
        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
		"dots": true,
		"dotData": true,
		"dotsData": true,
		"margin": 0
	    }'>
        @php $product=\App\Models\product::inRandomOrder()->limit(5)->get(); $count=1; @endphp
        @foreach($product as $productWrite)

            <div class="item" data-dot="<button>0{{ $count++ }}</button>">
                <div class="main-slider-five__item">
                    <div class="main-slider-five__bg">
                        <img src="{{ asset("imageAvif/product/")."/".$productWrite->imagesAvif }}" alt="COLİZO">
                        <img src="{{ asset("imageAvif/product/")."/".$productWrite->imagesAvif }}" alt="COLİZO">
                    </div>
                    <div class="container">
                        <div class="main-slider-five__content">
                            <h5 class="main-slider-five__sub-title"><span
                                    class="main-slider-five__sub-title__border"></span>{{ \App\Models\category::getNameEnglish($productWrite->categoryId) }}</h5>
                            <!-- slider-sub-title -->
                            <h2 class="main-slider-five__title">{{ $productWrite->titleEnglish }}</h2>
                            <!-- slider-title -->

                            <ul class="main-slider-five__list">
                                <li><i class="tolak-icons-two-badge-check"></i>Quality</li>
                                <li><i class="tolak-icons-two-global-solution"></i>Leading Work</li>
                            </ul>
                            <div class="main-slider-five__btn">
                                <a href="{{ route("productDetailHtmlEN",["id"=>$productWrite->id,"name"=>\App\Http\Controllers\support\functionController::seo($productWrite->title)]) }}" class="tolak-btn-two">
                                    <span class="tolak-btn-two__left-star"></span>
                                    <span>See Product<i class="tolak-icons-two-arrow-right-short"></i></span>
                                    <span class="tolak-btn-two__right-star"></span>
                                </a>

                            </div>
                        </div><!-- slider-content -->
                    </div>

                </div>
            </div><!-- item -->
        @endforeach

    </div>
</section>
