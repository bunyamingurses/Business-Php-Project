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

            <h1 class="card-title display-5">Site Hizmet Güncelleme Formu</h1>
        </div>
        <form action="{{ route("admin.service.update",["id"=>$service[0]["id"]]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Hizmet Fotoğraf</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageAvif/service/")."/".$service[0]["imagesAvif"] }}" width="200" class="mb-2" alt="">
                    <input type="file" class="form-control" id="foto" name="foto" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Hizmet Başlık</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="serviceTitle" name="serviceTitle" value="{{ $service[0]["title"] }}" placeholder="Hizmet Başlık Girin!"  aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Hizmet Başlık</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="serviceTitleEnglish" name="serviceTitleEnglish" value="{{ $service[0]["titleEnglish"] }}" placeholder="Hizmet Başlık Girin!"  aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Hizmet Açıklama</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="serviceDescription" name="serviceDescription" placeholder="Hizmet Açıklama Girin!" aria-describedby="">{!!  html_entity_decode($service[0]["text"]) !!}</textarea>
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Hizmet Açıklama</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="serviceDescriptionEnglish" name="serviceDescriptionEnglish" placeholder="Hizmet Açıklama Girin!" aria-describedby="">{!!  html_entity_decode($service[0]["textEnglish"]) !!}</textarea>
                </div>
            </div>


            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">
                    <button type="submit" class="btn btn-primary">Hizmet Güncelle <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection
