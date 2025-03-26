@extends("layouts.admin.index")
@section("content")

    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">İş Ortakları</h6>
        </div>
        <div class="card-body">

            <div class="container-fluid card  p-4">
                <div class="card-header mb-4">

                    <h3 class="card-title ">Site İş Ortakları Ekleme Formu</h3>
                </div>
                <form action="{{ route("admin.setting.referencePost") }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-12 row">

                        <div class="col-lg-2">
                            <label for="">İş Ortağı Fotoğraf</label>
                        </div>
                        <div class="col-lg-10 form-group">
                            <input type="file" class="form-control" id="foto" name="foto" aria-describedby="">
                        </div>
                    </div>

                    <div class="col-lg-12 row">

                        <div class="col-lg-2">
                            <label for="">İş Ortağı Adı</label>
                        </div>
                        <div class="col-lg-10 form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="İş Ortağı Adı" aria-describedby="">
                        </div>
                    </div>

                    <div class="col-lg-12 row">

                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-10 form-group">
                            <button type="submit" class="btn btn-primary">İş Ortağı Ekle <span class="fa fa-plus-circle"></span></button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-lg-12 mt-4">
                <div class="row">
                    @foreach($reference as $referenceWrite)
                        <div class="col-6 col-md-3">

                            <div class="card mt-2">
                                <img src="{{ asset("imageAvif/reference/")."/".$referenceWrite->image }}" class="card-img" alt="">
                            </div>
                            <div class="card-body">
                                {{ $referenceWrite->name }}
                            </div>
                            <div class="card-footer">
                                <a href="{{ route("admin.setting.referenceDestroy",["id"=>$referenceWrite->id]) }}" class="btn btn-danger"><span class="fa fa-trash-alt"></span> Sil</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>





        </div>
    </div>

@endsection
