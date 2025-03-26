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

            <h1 class="card-title display-5">Site Ürün Ekleme Formu</h1>
        </div>
        <form action="{{ route("admin.product.store") }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Fotoğraf</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="file" class="form-control" id="foto" name="foto" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Başlık</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="productTitle" name="productTitle" placeholder="Ürün Başlık Girin!"  aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Başlık İngilizce</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="productTitleEnglish" name="productTitleEnglish" placeholder="Ürün Başlık İngilizce Girin!"  aria-describedby="">
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Başlık İngilizce</label>
                </div>
                <div class="col-lg-10 form-group">
                    <select name="categoryId" id="categoryId" class="form-control">
                        <option value="0" selected disabled>Lütfen Kategori Seçin</option>
                        @foreach($category as $categoryWrite)
                            <option value="{{ $categoryWrite->id }}">{{ $categoryWrite->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Açıklama</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="productDescription" name="productDescription" placeholder="Ürün Açıklama Girin!" aria-describedby=""></textarea>
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Açıklama İngilizce</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="productDescriptionEnglish" name="productDescriptionEnglish" placeholder="Ürün Açıklama İngilizce Girin!" aria-describedby=""></textarea>
                </div>
            </div>


            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">
                    <button type="submit" class="btn btn-primary">Ürün Ekle <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection
