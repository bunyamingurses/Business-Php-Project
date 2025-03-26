@extends("layouts.front.tr.index")
@section("content")
    @include("layouts.front.tr.partial.banner")


    <section class="contact-two contact-two--contact-page">
        <div class="container">
            <div class="contact-two__wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-two__info">
                            <div class="contact-two__info__shape"
                                 style="background-image: url({{ asset("asset/front/images/shapes/contact-2-shape-1.png") }});"></div>
                            <h4 class="contact-two__info__title">İletişim Bilgileri :</h4>
                            <ul class="contact-two__info__box-wrapper">
                                <li class="contact-two__info__box">
                                    <div class="contact-two__info__box__icon"><i class="icon-phone-call"></i></div>
                                    <h4 class="contact-two__info__box__title">Bizi Arayın</h4>
                                    <p class="contact-two__info__box__text"><a
                                            href="tel:+90 {{ \App\Models\setting::getSetting("phoneNumber") }}">+90 {{ \App\Models\setting::getSetting("phoneNumber") }}</a>
                                    </p>
                                </li>
                                <li class="contact-two__info__box">
                                    <div class="contact-two__info__box__icon"><i class="icon-open-mail"></i></div>
                                    <h4 class="contact-two__info__box__title">E-Posta</h4>
                                    <p class="contact-two__info__box__text"><a
                                            href="mailto:{{ \App\Models\setting::getSetting("email") }}">{{ \App\Models\setting::getSetting("email") }}</a>
                                    </p>
                                </li>
                                <li class="contact-two__info__box">
                                    <div class="contact-two__info__box__icon"><i class="icon-pin"></i></div>
                                    <h4 class="contact-two__info__box__title">Adres</h4>
                                    <p class="contact-two__info__box__text">{{ \App\Models\setting::getSetting("address") }}</p>
                                </li>
                            </ul>
                            <div class="contact-two__info__social">
                                <h5 class="contact-two__info__social__title">Sosyal Medya:</h5>
                                <div class="contact-two__info__social__wrap">
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
                            </div><!-- contact-social -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-two__content">
                            <div class="sec-title-two text-left">
                                <h6 class="sec-title-two__tagline"><span
                                        class="sec-title-two__tagline__left icofont-rounded-double-left"></span>Bize
                                    Yazın<span
                                        class="sec-title-two__tagline__right icofont-rounded-double-right"></span></h6>
                                <!-- /.sec-title-two__tagline -->
                                <h3 class="sec-title-two__title">Mesajlarınızı ve sorularınızı İletin..</h3>
                                <!-- /.sec-title-two__title -->
                            </div><!-- /.sec-title-two -->
                            <p class="text-white">İletişim formunu doldurun, en kısa zamanda sizinle iletişime
                                geçelim.</p>
                            @if(session("status"))
                                <div class="alert alert-info"> {{ session("status") }}</div>
                            @endif
                            @if($errors->any())
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li class="text-danger font-weight-bold">*{{ $error }}</li>
                                    @endforeach
                                </ul>

                            @endif
                            <form class="contact-two__form form-one" action="{{ route("contactPostTR") }}" method="post">
                                <div class="form-one__group">
                                    @csrf
                                        <div class="form-one__control form-one__control--full">
                                            <input type="text" id="name" name="name"
                                                   placeholder="Adınızı ve Soyadınızı Girin!" required>
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="email" id="email" name="email"
                                                   placeholder="E-Posta Adresinizi Girin!" required>

                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="text" id="subject" name="subject" required
                                                   placeholder="Konuyu Belirtin!" >

                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control form-one__control--full">
                                        <textarea id="message" name="message" required
                                                  placeholder="Mesajınızı Belirtin!" ></textarea>

                                        </div><!-- /.form-one__control -->

                                    <div class="form-one__control form-one__control--full">
                                        <button type="submit" class="tolak-btn"><b>Mesaj İlet</b> <i class="fa fa-arrow-alt-circle-right"></i> <span></span>
                                        </button>
                                    </div><!-- /.form-one__control -->
                                </div><!-- /.form-one__group -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </section><!-- /.contact -->

@endsection
