<?php

namespace App\Http\Controllers\admin\services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\services;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = services::get();
        return View("admin.service.index", ["service" => $services]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.service.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->serviceTitle) || isset($request->serviceDescription) || isset($request->foto)) {
            $all = [];
            if (isset($request->serviceTitle)) {
                $title = functionController::security($request->serviceTitle);
                $all += [
                    "title" => $title,
                ];
            }

            if (isset($request->serviceDescription)) {
                $description = functionController::security($request->serviceDescription);
                $all += [
                    "text" => $description,
                ];
            }

            if (isset($request->serviceTitleEnglish)) {
                $title = functionController::security($request->serviceTitleEnglish);
                $all += [
                    "titleEnglish" => $title,
                ];
            }

            if (isset($request->serviceDescriptionEnglish)) {
                $description = functionController::security($request->serviceDescriptionEnglish);
                $all += [
                    "textEnglish" => $description,
                ];
            }

            if (isset($request->foto)) {
                if (functionController::resimTurKontrol($request->File("foto")->getClientOriginalExtension())) {
                    $image = functionController::imageCreate($request, "service", "foto");
                    $imageAvif = functionController::imageCreateAvif($request, "service", "foto");
                    $all += [
                        "images" => $image,
                        "imagesAvif" => $imageAvif,
                    ];
                } else {
                    return redirect()->back()->with("status", "Lütfen desteklenen biçimlerdeki fotoğrafları kullanın.");
                }
            }

            $create = services::create($all);
            if ($create) {
                return redirect()->back()->with("status", "Hizmet Başarı ile Eklendi.");
            } else {
                return redirect()->back()->with("status", "Hizmet Eklenemedi. Lütfen Tekrar Deneyin.");
            }

        } else {
            return redirect()->back()->with("status", "Lütfen Boş ALan Bırakmayın.");
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
            $service = services::where("id", functionController::security($id))->get();
            if ($service[0]["title"]) {
                return View("admin.service.edit", ["service" => $service]);
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
            $service = services::find(functionController::security($id));
            if (isset($service->id)) {

                if (isset($request->serviceTitle) || isset($request->serviceDescription) || isset($request->serviceTitleEnglish) || isset($request->serviceDescriptionEnglish) || isset($request->foto)) {
                    if (isset($request->serviceTitle)) {
                        $title = functionController::security($request->serviceTitle);
                        $service->title = $title;
                    }

                    if (isset($request->serviceDescription)) {
                        $description = functionController::security($request->serviceDescription);
                        $service->text = $description;
                    }
                    if (isset($request->serviceTitleEnglish)) {
                        $title = functionController::security($request->serviceTitleEnglish);
                        $service->titleEnglish = $title;
                    }

                    if (isset($request->serviceDescriptionEnglish)) {
                        $description = functionController::security($request->serviceDescriptionEnglish);
                        $service->textEnglish = $description;
                    }



                    if (isset($request->foto)) {
                        if (functionController::resimTurKontrol($request->File("foto")->getClientOriginalExtension())) {
                            $image = functionController::imageCreate($request, "service", "foto");
                            $imageAvif = functionController::imageCreateAvif($request, "service", "foto");
                            $service->images=$image;
                            $service->imagesAvif=$imageAvif;
                        } else {
                            return redirect()->back()->with("status", "Lütfen desteklenen biçimlerdeki fotoğrafları kullanın.");
                        }
                    }

                    $update = $service->save();
                    if ($update) {
                        return redirect()->back()->with("status", "Hizmet Başarı ile Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Hizmet Güncellenemedi. Lütfen Tekrar Deneyin.");
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
            $service = services::where("id", functionController::security($id))->get();
            if ($service[0]["id"]) {
                $delete = services::where("id", functionController::security($id))->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Hizmet Başarı ile Silindi.");
                } else {
                    return redirect()->back()->with("status", "Hizmet ile Silinemedi.");
                }
            }
        }
    }


    public function popular(string $id)
    {
        if (isset($id)) {
            $service = services::where("id", functionController::security($id))->get();
            if ($service[0]["id"]) {
                if ($service[0]["isPopular"] == 1) {
                    $all = ["isPopular" => 0];
                    $update = services::where("id", functionController::security($id))->update($all);
                    if ($update) {
                        return redirect()->back()->with("status", "Hizmet Başarı ile Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Hizmet ile Güncellenemedi.");
                    }
                } else {
                    $all = ["isPopular" => 1];
                    $update = services::where("id", functionController::security($id))->update($all);
                    if ($update) {
                        return redirect()->back()->with("status", "Hizmet Başarı ile Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Hizmet Güncellenemedi.");
                    }
                }


            }
        }
    }


}
