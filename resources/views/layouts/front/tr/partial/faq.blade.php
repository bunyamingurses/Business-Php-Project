@php $faq=\App\Models\faq::all(); @endphp
@if(isset($faq[0]["id"]))
    <section class="faq-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="faq-page__contact background-base">
                        <h3 class="faq-page__contact__title">Sorunuz Mu Var!<br>Hemen Arayın!</h3>
                        <!-- /.faq-page__contact__title -->
                        <div class="faq-page__contact__text">
                            <i class="icofont-phone"></i>
                            <p class="faq-page__contact__number">
                                Sorunuz Mu Var?<br>
                                <a href="tel:+90 {{ \App\Models\setting::getSetting("phoneNumber") }}">+90 {{ \App\Models\setting::getSetting("phoneNumber") }}</a>
                            </p><!-- /.faq-page__contact__number -->
                        </div><!-- /.faq-page__contact__text -->
                    </div><!-- /.faq-page__contact -->
                </div><!-- /.col-lg-4 col-xl-3 -->
                <div class="col-lg-8">
                    <div class="faq-page__accordion tolak-accrodion" data-grp-name="tolak-accrodion">

                        @foreach($faq as $faqWrite)
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>
                                        <i class="fa fa-check-circle"></i>
                                        {{ $faqWrite->name }}
                                        <span class="accrodion-title__icon"></span><!-- /.accrodion-title__icon -->
                                    </h4>
                                </div><!-- /.accordian-title -->
                                <div class="accrodion-content" style="">
                                    <div class="inner">
                                        <p>{!! html_entity_decode($faqWrite->text) !!}</p>
                                    </div><!-- /.accordian-content -->
                                </div>
                            </div><!-- /.accordian-item -->
                        @endforeach


                    </div>
                </div><!-- /.col-lg-8 col-xl-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
@endif
