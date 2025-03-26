<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\category;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::all();
        return View("admin.category.index", ["category" => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(array(
            "name" => "required|max:250",
            "nameEnglish" => "required|max:250",
            "image"=>"required|mimes:jpg,jpeg,png|max:10240",
        ), array(
            "name.required" => "Kategori İsmi Boş Bırakılamaz", "name.max" => "Kategori İsmi 250 karakterden fazla olamaz.",
            "nameEnglish.required" => "Kategori İngilizce İsmi Boş Bırakılamaz", "nameEnglish.max" => "Kategori İngilizce İsmi 250 karakterden fazla olamaz.",
            "image.required"=>"Fotoğraf Yüklemek Zorunludur.","image.mimes"=>"Fotoğraf türleri:.jpg, .jpeg ve .png olabilir.","image.max"=>"Yüklenecek fotoğraf en fazla 10mb büyüklüğünde olabilir."
        ));


        $name = functionController::security($request->name);
        $nameEnglish = functionController::security($request->nameEnglish);
        $image=functionController::imageCreate($request,"category","image");
        $imageAvif=functionController::imageCreateAvif($request,"category","image");

        $all = [
            "name" => $name,
            "nameEnglish" => $nameEnglish,
            "image"=>$image,
            "imageAvif"=>$imageAvif
        ];

        $create = category::create($all);
        if ($create->id) {
            return redirect()->back()->with("status", "Kategori Başarıyla Eklendi.");
        } else {
            return redirect()->back()->with("status", "Kategori Eklenemedi. Lütfen tekrar deneyin.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (isset($id)) {
            $category = category::find(functionController::security($id));
            if (isset($category->name)) {
                return View("admin.category.edit", ["category" => $category, "id" => $category->id]);
            } else {
                return redirect(route("admin.category.index"))->with("status", "Böyle bir kategori bulunmamakta.");
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(array(
            "name" => "required|max:250",
            "nameEnglish" => "required|max:250",
            "image"=>"mimes:jpg,jpeg,png|max:10240",

        ), array(
            "name.required" => "Kategori İsmi Boş Bırakılamaz", "name.max" => "Kategori İsmi 250 karakterden fazla olamaz.",
            "nameEnglish.required" => "Kategori İngilizce İsmi Boş Bırakılamaz", "nameEnglish.max" => "Kategori İngilizce İsmi 250 karakterden fazla olamaz.",
            "image.mimes"=>"Fotoğraf türleri:.jpg, .jpeg ve .png olabilir.","image.max"=>"Yüklenecek fotoğraf en fazla 10mb büyüklüğünde olabilir."
        ));


        $category = category::find(functionController::security($id));
        if (isset($category->id)) {
            $nameEnglish = functionController::security($request->nameEnglish);
            $name = functionController::security($request->name);

            $all = [
                "name" => $name,
                "nameEnglish"=>$nameEnglish,
            ];

            if (isset($request->image)){
                $image=functionController::imageCreate($request,"category","image");
                $imageAvif=functionController::imageCreateAvif($request,"category","image");
                $all+=[
                    "image"=>$image,
                    "imageAvif"=>$imageAvif
                ];
            }

            $update = category::where("id",$category->id)->update($all);
            if ($update) {
                return redirect()->back()->with("status", "Kategori Başarıyla Güncellendi.");
            } else {
                return redirect()->back()->with("status", "Kategori Güncellenemedi. Lütfen tekrar deneyin.");
            }
        }else{
            return redirect(route("admin.category.index"))->with("status", "Böyle bir kategori bulunmamakta.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)) {
            $delete = category::where("id", functionController::security($id))->delete();
            if ($delete) {
                return redirect()->back()->with("status", "Kategori Silindi.");
            } else {
                return redirect()->back()->with("status", "Kategori Silinemedi.");
            }
        }
    }
}
