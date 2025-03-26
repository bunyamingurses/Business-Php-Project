@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif



    <div class="col-lg-12 card shadow mb-4">
        <h3 class=" mt-2 card-header">Fotoğraf Ekle</h3>
        <form action="{{ route("admin.project.gallery.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-4">
                <div class="col-lg-12 row">

                    <div class="col-lg-2">
                        <label for="">Fotoğraf</label>
                    </div>
                    <div class="col-lg-10 form-group">
                        <input type="file" class="form-control" id="image"  name="image" aria-describedby="">
                    </div>
                </div>

                <div class="col-lg-12 row">

                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-10 form-group">
                        <input type="hidden" name="projectId" value="{{ $id }}">
                        <button type="submit" class="btn btn-primary mt-2">Fotoğraf Ekle <span class="fa fa-plus-circle"></span></button>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Proje Galeri Fotoğrafları</h6>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="row">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="carouselTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Fotoğraf</th>
                                <th>Eklenme Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Fotoğraf</th>
                                <th>Eklenme Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($gallery as $galleryWrite)
                                <tr>
                                    <td><img src="{{ asset("imageAvif/project/gallery/")."/".$galleryWrite->imageAvif }}" style="width: 200px; max-height: 150px;" alt=""></td>

                                    <td>{{ $galleryWrite->created_at }}</td>
                                    <td>
                                        <a href="{{ route("admin.project.gallery.destroy",["id"=>$galleryWrite->id]) }}" class="btn btn-danger"><span class="fa fa-times-circle"></span></a>
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
