@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif



    <div class="col-lg-12 card shadow mb-4">
        <h3 class=" mt-2 card-header">Fotoğraf Ekle</h3>
        <form action="{{ route("admin.product.gallery.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-4">
                <div class="col-lg-12 row">

                    <div class="col-lg-2">
                        <label for="">Fotoğraf</label>
                    </div>
                    <div class="col-lg-10 form-group">
                        <input type="file" class="form-control" id="image" name="image" aria-describedby="">
                    </div>
                </div>

                <div class="col-lg-12 row">

                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-10 form-group">
                        <input type="hidden" name="productId" value="{{ $id }}">
                        <button type="submit" class="btn btn-primary mt-2">Fotoğraf Ekle <span
                                class="fa fa-plus-circle"></span></button>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hizmet Galeri Fotoğrafları</h6>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="row">

                    @foreach($gallery as $galleryWrite)

                        <div class="col-lg-2 col-md-4 col-6 card">
                            <div class="card-header">Fotoğraf</div>
                            <div class="card-body"><img src="{{ asset("imageAvif/product/gallery/")."/".$galleryWrite->imageAvif }}" style="width: 100%; max-height: 150px;" alt=""></div>
                            <div class="card-footer"><a href="{{ route("admin.product.gallery.destroy",["id"=>$galleryWrite->id]) }}" class="btn btn-danger">Sil <span class="fa fa-times-circle"></span></a>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
