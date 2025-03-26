@extends("layouts.front.en.index")
@section("content")
    @include("layouts.front.en.partial.banner")


    <section class="product-details">
        <div class="container">
            <!-- /.product-details -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="product__sidebar product__sidebar-right">
                        <div class="product__price-ranger">
                            <h3 class="product__sidebar--title">CONTACT</h3>
                            <div class="price-ranger">
                                <p><span class="fa fa-envelope"></span> {{ \App\Models\setting::getSetting("email") }}
                                </p>
                                <p><span class="fa fa-phone-square"></span>
                                    +90 {{ \App\Models\setting::getSetting("phoneNumber") }}</p>
                            </div>
                        </div><!-- /.price-slider -->
                        <div class="product__categories">
                            <h3 class="product__sidebar--title">Products</h3>
                            <ul class="list-unstyled">
                                @php $popular=\App\Models\product::inRandomOrder()->limit(5)->get(); @endphp
                                @foreach($popular as $popularWrite)
                                    <li>
                                        <a href="{{ route("productDetailHtmlEN",["id"=>$popularWrite->id,"name"=>\App\Http\Controllers\support\functionController::seo($popularWrite->titleEnglish)]) }}"
                                           class="sec-btn"
                                           title="{{ $popularWrite->titleEnglish }}"><span
                                                class="fa fa-arrow-right"></span> {{ $popularWrite->titleEnglish }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div><!-- /.category-widget -->
                    </div>
                </div>
                <div class="col-lg-9 col-xl-9 wow" data-wow-delay="200ms">
                    <div class="product-details__img">
                        <img src="{{ asset("imageAvif/product/")."/".$product->imagesAvif }}" alt="">
                        <div class="product-details__img-search">
                            <a class="img-popup"
                               href="{{ asset("imageAvif/product/")."/".$product->imagesAvif }}"><span
                                    class="icon-magnifying-glass"></span></a>
                        </div><!-- /.product-image -->
                    </div>
                    <div class="product-details__content mt-4">
                        <div class="product-details__top">
                            <h3 class="product-details__title">{{ $product->titleEnglish }}</h3><!-- /.product-title -->
                        </div>

                        {!! html_entity_decode($product->textEnglish) !!}


                        <section class="gallery-one">
                            <div class="container-fluid">
                                <div class="row">


                                    @foreach($gallery as $galleryWrite)

                                        <div class="col-md-6 col-lg-3"  style="max-height: 250px;">
                                            <div class="gallery-one__card"  style="max-height: 250px;">
                                                <img src="{{ asset("imageAvif/product/gallery/")."/".$galleryWrite->imageAvif }}"  style="max-height: 250px;" alt="">
                                                <div class="gallery-one__card__hover">
                                                    <a href="{{ asset("imageAvif/product/gallery/")."/".$galleryWrite->imageAvif }}" class="img-popup">
                                                        <span class="gallery-one__card__icon"></span>
                                                    </a>
                                                </div><!-- /.gallery-one__card__hover -->
                                            </div><!-- /.gallery-one__card -->
                                        </div><!-- /.col-md-6 col-lg-4 -->

                                    @endforeach

                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </section><!-- /.gallery-one -->


                    </div>
                    <!-- /.product-description -->
                </div>
            </div>
    </section>
    <!-- Products End -->

@endsection
