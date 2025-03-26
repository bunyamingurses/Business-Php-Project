@extends("layouts.front.tr.index")
@section("content")
    @include("layouts.front.tr.partial.banner")

    @if($isCategory==1)
        <section class="product-one">
            <h2 class="sec-title-two__tagline text-center"><span
                    class="sec-title-two__tagline__left icofont-rounded-double-left"></span> COLİZO
                KATEGORİLER<span class="sec-title-two__tagline__right icofont-rounded-double-right"></span>
            </h2>
            <!-- /.sec-title-two__tagline -->
            <h1 class="text-center">COLİZO KATEGORİLER</h1>
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
                                            <a href="{{ route("productCategoryHtmlTR",["id"=>$categoryWrite->id,"name"=>$categoryWrite->name]) }}">
                                                <img
                                                    src="{{ asset("imageAvif/category/")."/".$categoryWrite->imageAvif }}"
                                                    style="max-height: 250px;" alt="{{ $categoryWrite->name }}">
                                            </a>

                                        </div><!-- /.product-image -->
                                        <div class="product__item__content">
                                            <h4 class="product__item__title"><a
                                                    href="{{ route("productCategoryHtmlTR",["id"=>$categoryWrite->id,"name"=>$categoryWrite->name]) }}">{{ $categoryWrite->name }}</a>
                                            </h4><!-- /.product-title -->
                                            <a href="{{ route("productCategoryHtmlTR",["id"=>$categoryWrite->id,"name"=>$categoryWrite->name]) }}"
                                               class="tolak-btn product__item__link"><b>Ürünleri Gör</b> <i
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
                ÜRÜNLER<span class="sec-title-two__tagline__right icofont-rounded-double-right"></span>
            </h2>
            <!-- /.sec-title-two__tagline -->
            <h1 class="text-center">COLİZO ÜRÜNLER</h1>
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
                                            <a href="{{ route("productDetailHtmlTR",["id"=>$productWrite->id,"name"=>$productWrite->title]) }}">
                                                <img
                                                    src="{{ asset("imageAvif/product/")."/".$productWrite->imagesAvif }}"
                                                    style="max-height: 250px;" alt="{{ $productWrite->name }}">
                                            </a>

                                        </div><!-- /.product-image -->
                                        <div class="product__item__content">
                                            <h4 class="product__item__title"><a
                                                    href="{{ route("productDetailHtmlTR",["id"=>$productWrite->id,"name"=>$productWrite->title]) }}">{{ $productWrite->title }}</a>
                                            </h4><!-- /.product-title -->
                                            <a href="{{ route("productDetailHtmlTR",["id"=>$productWrite->id,"name"=>$productWrite->title]) }}"
                                               class="tolak-btn product__item__link"><b>Ürünü Gör</b> <i
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
