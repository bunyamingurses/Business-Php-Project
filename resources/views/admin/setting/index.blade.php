@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif
    <div class="container-fluid card  p-4">
        <div class="card-header mb-4">

            <h3 class="card-title display-5">Site Bilgileri Formu</h3>
        </div>
        <form action="{{ route("admin.setting.update") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site İkon</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("image/setting/")."/".@$setting->icon }}" width="200px" alt="">
                    <input type="file" class="form-control" id="icon" name="icon" aria-describedby="icon">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Üst Logo</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageAvif/setting/")."/".@$setting->logoHeaderAvif }}" width="200px" alt="">
                    <input type="file" class="form-control" id="logoHeader" name="logoHeader" aria-describedby="logoHeader">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Alt Logo</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageAvif/setting/")."/".@$setting->logoFooterAvif }}" width="200px" alt="">
                    <input type="file" class="form-control" id="logoFooter" name="logoFooter" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Url</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteUrl" name="siteUrl" value="{{ @$setting->siteUrl }}" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Title</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteTitle" name="siteTitle" value="{{ @$setting->title }}" aria-describedby="title">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Description</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteDescription" name="siteDescription" value="{{ @$setting->description }}" aria-describedby="description">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Keyword</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteKeyword" name="siteKeyword" value="{{ @$setting->keyword }}" aria-describedby="keyword">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Author(Sahibi)</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteAuthor" name="siteAuthor" value="{{ @$setting->author }}" aria-describedby="author">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Telefon Numarası</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="sitePhoneNumber" name="sitePhoneNumber" value="{{ @$setting->phoneNumber }}" aria-describedby="phoneNumber">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">E-Posta Adresi</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteEmail" name="siteEmail" value="{{ @$setting->email }}" aria-describedby="email">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Şirket Adresi</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="address" name="address" value="{{ @$setting->address }}" aria-describedby="address">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Çalışma Saatleri</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="workingHours" name="workingHours" value="{{ @$setting->workingHours }}" aria-describedby="address">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Facebook</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ @$setting->facebook }}" aria-describedby="facebook">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Twitter</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ @$setting->twitter }}" aria-describedby="twitter">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">İnstagram</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ @$setting->instagram }}" aria-describedby="instagram">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Linkedin</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ @$setting->linkedin }}" aria-describedby="linkedin">
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
