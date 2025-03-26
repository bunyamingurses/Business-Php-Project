@extends("layouts.admin.index")
@section("style")
    <link rel="stylesheet" href="{{ asset("asset/ckeditor/content.css") }}">
    <script src="{{ asset("asset/ckeditor/styles.js") }}"></script>
    <script src="{{ asset("asset/ckeditor/ckeditor.js") }}"></script>
@endsection
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif
    <div class="container-fluid card  p-4">
        <div class="card-header mb-4">

            <h3 class="card-title display-5">Site Hakkımda Formu</h3>
        </div>
        <form action="{{ route("admin.setting.aboutPost") }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Hakkımda Fotoğraf</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageAvif/setting/")."/".@$about->aboutImageAvif }}" width="200px" alt="">
                    <input type="file" class="form-control" id="image" name="image" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Banner Fotoğraf</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageAvif/setting/")."/".@$about->bannerImageAvif }}" width="200px" alt="">
                    <input type="file" class="form-control" id="imageBanner" name="imageBanner" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Hakkımda</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="about" name="about" rows="5" aria-describedby="">{!! html_entity_decode(@$about->about) !!}</textarea>
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Hakkımda İngilizce</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="about" name="aboutEnglish" rows="5" aria-describedby="">{!! html_entity_decode(@$about->aboutEnglish) !!}</textarea>
                </div>
            </div>



            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">
                    <button type="submit" class="btn btn-primary">Ayarları Kaydet <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>










@endsection
