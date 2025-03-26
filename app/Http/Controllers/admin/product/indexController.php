<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = product::all();
        return View("admin.product.index", ["product" => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=category::all();
        return view("admin.product.create",["category"=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->categoryId)) {
            $category = category::find(functionController::security($request->categoryId));
            if (isset($category->id)) {
                if (isset($request->productTitle) || isset($request->productDescription) || isset($request->foto)) {

                    $all = ["categoryId"=>$category->id];

                    if (isset($request->productTitle)) {
                        $title = functionController::security($request->productTitle);
                        $all += [
                            "title" => $title,
                        ];
                    }

                    if (isset($request->productDescription)) {
                        $description = functionController::security($request->productDescription);
                        $all += [
                            "text" => $description,
                        ];
                    }

                    if (isset($request->productTitleEnglish)) {
                        $title = functionController::security($request->productTitleEnglish);
                        $all += [
                            "titleEnglish" => $title,
                        ];
                    }

                    if (isset($request->productDescriptionEnglish)) {
                        $description = functionController::security($request->productDescriptionEnglish);
                        $all += [
                            "textEnglish" => $description,
                        ];
                    }

                    if (isset($request->foto)) {
                        if (functionController::resimTurKontrol($request->File("foto")->getClientOriginalExtension())) {
                            $image = functionController::imageCreate($request, "product", "foto");
                            $imageAvif = functionController::imageCreateAvif($request, "product", "foto");
                            $all += [
                                "images" => $image,
                                "imagesAvif" => $imageAvif,
                            ];
                        } else {
                            return redirect()->back()->with("status", "Lütfen desteklenen biçimlerdeki fotoğrafları kullanın.");
                        }
                    }

                    $create = product::create($all);
                    if ($create) {
                        return redirect()->back()->with("status", "Ürün Başarı ile Eklendi.");
                    } else {
                        return redirect()->back()->with("status", "Ürün Eklenemedi. Lütfen Tekrar Deneyin.");
                    }

                } else {
                    return redirect()->back()->with("status", "Lütfen Boş ALan Bırakmayın.");
                }
            }else{
                return redirect(route("admin.product.index"));
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
        if (isset($id)) {
            $category=category::all();
            $product = product::where("id", functionController::security($id))->get();
            if ($product[0]["id"]) {
                return View("admin.product.edit", ["product" => $product,"category"=>$category]);
            } else {
                return redirect(route("admin.index"));
            }
        } else {
            return redirect(route("admin.index"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($id)) {
            $product = product::find(functionController::security($id));
            if (isset($product->id) && isset($request->categoryId)) {

                if (isset($request->productTitle) || isset($request->productDescription) || isset($request->productTitleEnglish) || isset($request->productDescriptionEnglish) || isset($request->foto)) {
                    if (isset($request->productTitle)) {
                        $title = functionController::security($request->productTitle);
                        $product->title = $title;
                    }

                    if (isset($request->categoryId)) {
                        $category = functionController::security($request->categoryId);
                        $product->categoryId = $category;
                    }


                    if (isset($request->productDescription)) {
                        $description = functionController::security($request->productDescription);
                        $product->text = $description;
                    }

                    if (isset($request->productTitleEnglish)) {
                        $titleEnglish = functionController::security($request->productTitleEnglish);
                        $product->titleEnglish = $titleEnglish;
                    }

                    if (isset($request->productDescriptionEnglish)) {
                        $description = functionController::security($request->productDescriptionEnglish);
                        $product->textEnglish = $description;
                    }

                    if (isset($request->foto)) {
                        if (functionController::resimTurKontrol($request->File("foto")->getClientOriginalExtension())) {
                            $image = functionController::imageCreate($request, "product", "foto");
                            $imageAvif = functionController::imageCreateAvif($request, "product", "foto");
                            $product->images = $image;
                            $product->imagesAvif = $imageAvif;
                        } else {
                            return redirect()->back()->with("status", "Lütfen desteklenen biçimlerdeki fotoğrafları kullanın.");
                        }
                    }

                    $update = $product->save();
                    if ($update) {
                        return redirect()->back()->with("status", "Ürün Başarı ile Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Ürün Güncellenemedi. Lütfen Tekrar Deneyin.");
                    }

                } else {
                    return redirect()->back()->with("status", "Lütfen Boş ALan Bırakmayın.");
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)) {
            $product = product::where("id", functionController::security($id))->get();
            if ($product[0]["id"]) {
                $delete = product::where("id", functionController::security($id))->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Ürün Başarı ile Silindi.");
                } else {
                    return redirect()->back()->with("status", "Ürün ile Silinemedi.");
                }
            }
        }
    }


    public function popular(string $id)
    {
        if (isset($id)) {
            $product = product::where("id", functionController::security($id))->get();
            if ($product[0]["id"]) {
                if ($product[0]["isPopular"] == 1) {
                    $all = ["isPopular" => 0];
                    $update = product::where("id", functionController::security($id))->update($all);
                    if ($update) {
                        return redirect()->back()->with("status", "Ürün Başarı ile Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Ürün ile Güncellenemedi.");
                    }
                } else {
                    $all = ["isPopular" => 1];
                    $update = product::where("id", functionController::security($id))->update($all);
                    if ($update) {
                        return redirect()->back()->with("status", "Ürün Başarı ile Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Ürün Güncellenemedi.");
                    }
                }


            }
        }
    }


}
