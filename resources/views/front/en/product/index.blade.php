@extends("layouts.front.en.index")
@section("content")
    @include("layouts.front.en.partial.banner")

    @if($isCategory==1)
        <section class="product-one">
            <h2 class="sec-title-two__tagline text-center"><span
                    class="sec-title-two__tagline__left icofont-rounded-double-left"></span> COLİZO
                CATEGORIES<span class="sec-title-two__tagline__right icofont-rounded-double-right"></span>
            </h2>
            <!-- /.sec-title-two__tagline -->
            <h1 class="text-center">COLİZO CATEGORIES</h1>
            <!-- /.sec-title-two__title -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 justify-content-center">


                        <div class="row gutter-y-30 justify-content-center">
                            @foreach($category as $categoryWrite)
                                <div class="col-md-6 col-lg-3">
                                    <div class="product__item wow fadeInUp" data-wow-duration='1500ms'
                                         data-wow-delay='000ms'>
                                        <div class="product__item__img">
                                            <a href="{{ route("productCategoryHtmlEN",["id"=>$categoryWrite->id,"name"=>$categoryWrite->nameEnglish]) }}">
                                                <img
                                                    src="{{ asset("imageAvif/category/")."/".$categoryWrite->imageAvif }}"
                                                    style="max-height: 250px;" alt="{{ $categoryWrite->nameEnglish }}">
                                            </a>

                                        </div><!-- /.product-image -->
                                        <div class="product__item__content">
                                            <h4 class="product__item__title"><a
                                                    href="{{ route("productCategoryHtmlEN",["id"=>$categoryWrite->id,"name"=>\App\Http\Controllers\support\functionController::seo($categoryWrite->nameEnglish)]) }}">{{ $categoryWrite->nameEnglish }}</a>
                                            </h4><!-- /.product-title -->
                                            <a href="{{ route("productCategoryHtmlEN",["id"=>$categoryWrite->id,"name"=>\App\Http\Controllers\support\functionController::seo($categoryWrite->nameEnglish)]) }}"
                                               class="tolak-btn product__item__link"><b>See Products</b> <i
                                                    class="far fa-eye"></i></a>
                                        </div><!-- /.product-content -->
                                    </div><!-- /.product-item -->
                                </div><!-- /.col-md-6 col-lg-4 -->
                            @endforeach

                        </div><!-- /.row -->
                    </div><!-- /.col-lg-9 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.product-one product-one--page -->
    @endif

    @if($isCategory==0)
        <section class="product-one">
            <h2 class="sec-title-two__tagline text-center"><span
                    class="sec-title-two__tagline__left icofont-rounded-double-left"></span> COLİZO
                PRODUCTS<span class="sec-title-two__tagline__right icofont-rounded-double-right"></span>
            </h2>
            <!-- /.sec-title-two__tagline -->
            <h1 class="text-center">COLİZO PRODUCTS</h1>
            <!-- /.sec-title-two__title -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 justify-content-center">


                        <div class="row gutter-y-30 justify-content-center">
                            @foreach($product as $productWrite)
                                <div class="col-md-6 col-lg-3">
                                    <div class="product__item wow fadeInUp" data-wow-duration='1500ms'
                                         data-wow-delay='000ms'>
                                        <div class="product__item__img">
                                            <a href="{{ route("productDetailHtmlEN",["id"=>$productWrite->id,"name"=>$productWrite->titleEnglish]) }}">
                                                <img
                                                    src="{{ asset("imageAvif/product/")."/".$productWrite->imagesAvif }}"
                                                    style="max-height: 250px;" alt="{{ $productWrite->nameEnglish }}">
                                            </a>

                                        </div><!-- /.product-image -->
                                        <div class="product__item__content">
                                            <h4 class="product__item__title"><a
                                                    href="{{ route("productDetailHtmlEN",["id"=>$productWrite->id,"name"=>\App\Http\Controllers\support\functionController::seo($productWrite->titleEnglish)]) }}">{{ $productWrite->titleEnglish }}</a>
                                            </h4><!-- /.product-title -->
                                            <a href="{{ route("productDetailHtmlEN",["id"=>$productWrite->id,"name"=>\App\Http\Controllers\support\functionController::seo($productWrite->titleEnglish)]) }}"
                                               class="tolak-btn product__item__link"><b>See Product</b> <i
                                                    class="far fa-eye"></i></a>
                                        </div><!-- /.product-content -->
                                    </div><!-- /.product-item -->
                                </div><!-- /.col-md-6 col-lg-4 -->
                            @endforeach

                        </div><!-- /.row -->
                    </div><!-- /.col-lg-9 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.product-one product-one--page -->
    @endif


@endsection
