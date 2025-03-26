@extends("layouts.admin.index")
@section("style")
    <link href="{{ asset("assets/adminAssets/vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
@endsection
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif
    <div class="container-fluid card  p-4">
        <div class="card-header mb-4">

            <h1 class="card-title display-5">Kategoriler</h1>
        </div>

        <div class="card-body">
            <form action="{{ route("admin.category.update",["id"=>" $id "]) }}" method="post" enctype="multipart/form-data">
                @csrf

                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-danger font-weight-bold">*{{ $error }}</li>
                        @endforeach
                    </ul>

                @endif

                <div class="col-lg-12 row">
                    <div class="col-lg-2">
                        <label class="control-label col-lg-12" for="siteUrl">Kategori Fotoğraf
                            <span class="required">*</span>
                        </label>
                    </div>
                    <div class="col-lg-10 form-group">
                        <img src="{{ asset("imageAvif/category/")."/".$category->imageAvif }}" width="150" alt="">
                        <input type="file" id="image" name="image"
                               class="form-control col-lg-12">
                    </div>
                </div>


                <div class="col-lg-12 row">

                    <div class="col-lg-2">
                        <label class="control-label col-lg-12" for="siteUrl">Kategori Adı
                            <span class="required">*</span>
                        </label>
                    </div>
                    <div class="col-lg-10 form-group">
                        <input type="text" id="name" name="name" required="required"
                               class="form-control col-lg-12"
                               value="{{ $category->name }}"
                               placeholder="Lütfen Kategori Adı Girin.!">
                    </div>
                </div>





                <div class="col-lg-12 row">

                    <div class="col-lg-2">
                        <label class="control-label col-lg-12" for="siteUrl">Kategori Adı İnglizce
                            <span class="required">*</span>
                        </label>
                    </div>
                    <div class="col-lg-10 form-group">
                        <input type="text" id="nameEnglish" name="nameEnglish" required="required"
                               class="form-control col-lg-12"
                               value="{{ $category->nameEnglish }}"
                               placeholder="Lütfen Kategori Adı İnglizce Girin.!">
                    </div>
                </div>






                <div class="col-lg-12 row">

                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-10 form-group">
                        <button type="submit" class="btn btn-primary">Kategori Ekle <span class="fa fa-plus-circle"></span></button>
                    </div>
                </div>
            </form>






        </div>


    </div>
@endsection

@section("script")
    <!-- Page level plugins -->
    <script src="{{ asset("assets/adminAssets/vendor/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/adminAssets/vendor/datatables/dataTables.bootstrap4.min.js") }}"></script>
    <script>
        $("#carouselTable").dataTable()
    </script>
@endsection
