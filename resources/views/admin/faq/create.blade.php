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

            <h1 class="card-title display-5">Site Soru Ekleme Formu</h1>
        </div>
        <form action="{{ route("admin.faq.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Başlık</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Başlık Girin!"  aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Başlık İngilizce</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="titleEnglish" name="titleEnglish" placeholder="Başlık İngilizce Girin!"  aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Açıklama</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="description" name="description" placeholder="Açıklama Girin!" aria-describedby=""></textarea>
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Açıklama İngilizce</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="descriptionEnglish" name="descriptionEnglish" placeholder="Açıklama İngilizce Girin!" aria-describedby=""></textarea>
                </div>
            </div>


            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">
                    <button type="submit" class="btn btn-primary">Soru Ekle <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection
