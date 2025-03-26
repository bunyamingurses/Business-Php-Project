@extends("layouts.front.en.index")
@section("content")
    @include("layouts.front.en.partial.banner")
    <section class="about-three">
        <h2 class="sec-title-two__tagline text-center"><span
                class="sec-title-two__tagline__left icofont-rounded-double-left"></span> ABOUT COLİZO<span class="sec-title-two__tagline__right icofont-rounded-double-right"></span>
        </h2>
        <!-- /.sec-title-two__tagline -->
        <h1 class="text-center">ABOUT COLİZO</h1>
        <!-- /.sec-title-two__title -->
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-three__image">
                        <div class="col-md-12">
                            <div class="about-three__image__two">
                                <img class="w-100"
                                     src="{{ asset("imageAvif/setting/")."/".\App\Models\about::getAbout("aboutImageAvif") }}"
                                     alt="COLİZO">
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-12 wow fadeInRight animated mt-4" data-wow-delay="200ms"
                     style="visibility: visible; animation-delay: 200ms; animation-name: fadeInRight;">
                    <div class="about-three__content">

                        <p class="font-weight-normal">
                            {!! html_entity_decode(\App\Models\about::getAbout("aboutEnglish")) !!}
                        </p>


                    </div><!-- /.about__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    @include("layouts.front.en.partial.faq")
@endsection
