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

            <h3 class="card-title display-5">Site Misyon - Vizyo Formu</h3>
        </div>
        <form action="{{ route("admin.setting.missionvisionPost") }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Misyon</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="mission" name="mission" rows="5" aria-describedby="title">{!! html_entity_decode(@$about->mission) !!}</textarea>
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Misyon İngilizce</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="mission" name="missionEnglish" rows="5" aria-describedby="title">{!! html_entity_decode(@$about->missionEnglish) !!}</textarea>
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Vizyon</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="vision" name="vision" rows="5" aria-describedby="description">{!! html_entity_decode(@$about->vision) !!}</textarea>
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Vizyon İngilizce</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="vision" name="visionEnglish" rows="5" aria-describedby="description">{!! html_entity_decode(@$about->visionEnglish) !!}</textarea>
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
