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

            <h1 class="card-title display-5">Site Proje Güncelleme Formu</h1>
        </div>
        <form action="{{ route("admin.project.update",["id"=>$project[0]["id"]]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Proje Fotoğraf</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageAvif/project/")."/".$project[0]["imagesAvif"] }}" width="200" class="mb-2" alt="">
                    <input type="file" class="form-control" id="foto" name="foto" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Proje Başlık</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="projectTitle" name="projectTitle" value="{{ $project[0]["title"] }}" placeholder="Hizmet Başlık Girin!"  aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Proje Başlık İngilizce</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="projectTitleEnglish" name="projectTitleEnglish" value="{{ $project[0]["titleEnglish"] }}" placeholder="Hizmet Başlık İngilizce Girin!"  aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Proje Açıklama</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="projectDescription" name="projectDescription" placeholder="Hizmet Açıklama Girin!" aria-describedby="">{!!  html_entity_decode($project[0]["text"]) !!}</textarea>
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Proje Açıklama İngilizce</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="projectDescriptionEnglish" name="projectDescriptionEnglish" placeholder="Hizmet Açıklama İngilizce Girin!" aria-describedby="">{!!  html_entity_decode($project[0]["textEnglish"]) !!}</textarea>
                </div>
            </div>


            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">
                    <button type="submit" class="btn btn-primary">Proje Güncelle <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection
