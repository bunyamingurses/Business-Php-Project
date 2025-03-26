<?php

namespace App\Http\Controllers\admin\product\gallery;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\productGallery;
use App\Models\product;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->id)) {
            $id = functionController::security($request->id);
            $product = product::where("id", $id)->get();
            if (isset($product[0]["id"])) {
                $gallery = productGallery::where("productId", $id)->get();
                return View("admin.product.gallery.index", ["gallery" => $gallery, "id" => $id]);
            } else {
                return redirect()->back()->with("status", "Servis Mevcut Değil!");
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->productId)) {

            $all = [];
            $id = functionController::security($request->productId);

            $all += ["productId" => functionController::security($id)];
            if ($request->File("image") != null || $request->name) {
                if ($request->File("image") != null) {
                    if (functionController::resimTurKontrol($request->file("image")->getClientOriginalExtension())) {
                        $image = functionController::imageCreate($request, "product/gallery", "image");
                        $imageAvif = functionController::imageCreateAvif($request, "product/gallery", "image");
                        $all += [
                            "image" => $image,
                            "imageAvif" => $imageAvif,
                        ];
                    } else {
                        return redirect()->back()->with("status", "Lütfen Desteklenen Formatlardaki Fotoğrafları Kullanın!");
                    }

                }

                if ($all != null) {
                    $craete = productGallery::create($all);
                    if ($craete) {
                        return redirect()->back()->with("status", "Fotoğraf Başarıyla Eklendi.");
                    } else {
                        return redirect()->back()->with("status", "Fotoğraf Eklenemedi. Lütfen Tekrar Deneyin!");
                    }
                }

            } else {
                return redirect()->back();
            }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)) {
            $gallery = productGallery::where("id", functionController::security($id))->get();
            if ($gallery[0]["id"]) {
                $delete = productGallery::where("id", functionController::security($id))->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Fotoğraf Başarı ile Silindi.");
                } else {
                    return redirect()->back()->with("status", "Fotoğraf ile Silinemedi.");
                }
            }
        }
    }
}
