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
            <form action="{{ route("admin.category.create") }}" method="post" enctype="multipart/form-data">
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
                        <input type="file" id="image" name="image" required="required"
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







            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategoriler Tablosu</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="carouselTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Fotoğraf</th>
                                <th>İsim</th>
                                <th>İsim İngilizce</th>
                                <th>Eklenme Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Fotoğraf</th>
                                <th>İsim</th>
                                <th>İSim İngilizce</th>
                                <th>Eklenme Tarihi</th>
                                <th>İşlemler</th>
                            </tr>

                            </tfoot>
                            <tbody>

                            @foreach($category as $categoryWrite)
                                <tr>
                                    <td><img src="{{ asset("imageAvif/category/")."/".$categoryWrite->imageAvif }}" width="150" alt=""></td>
                                    <td>{{ $categoryWrite->name }}</td>
                                    <td>{{ $categoryWrite->nameEnglish }}</td>
                                    <td>{{ $categoryWrite->created_at }}</td>
                                    <td>
                                        <a href="{{ route("admin.category.edit",["id"=>$categoryWrite->id]) }}" class="btn btn-success"><span class="fa fa-edit"></span></a>
                                        <a href="{{ route("admin.category.destroy",["id"=>$categoryWrite->id]) }}" class="btn btn-danger"><span class="fa fa-trash-alt"></span></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
