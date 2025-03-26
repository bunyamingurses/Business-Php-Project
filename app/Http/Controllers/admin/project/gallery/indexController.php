<?php

namespace App\Http\Controllers\admin\project\gallery;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\projectGallery;
use App\Models\project;
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
            $project = project::where("id", $id)->get();
            if (isset($project[0]["id"])) {
                $gallery = projectGallery::where("projectId", $id)->get();
                return View("admin.project.gallery.index", ["gallery" => $gallery, "id" => $id]);
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
        if ($request->File("image") != null ) {
            if (functionController::resimTurKontrol($request->file("image")->getClientOriginalExtension())) {

                $image = functionController::imageCreate($request, "project/gallery", "image");
                $imageAvif = functionController::imageCreateAvif($request, "project/gallery", "image");


                $id = functionController::security($request->projectId);

                $all = [
                    "projectId" => $id,
                    "image" => $image,
                    "imageAvif" => $imageAvif,
                ];

                $craete = projectGallery::create($all);
                if ($craete) {
                    return redirect()->back()->with("status", "Fotoğraf Başarıyla Eklendi.");
                } else {
                    return redirect()->back()->with("status", "Fotoğraf Eklenemedi. Lütfen Tekrar Deneyin!");
                }
            }else{
                return redirect()->back()->with("status", "Lütfen Desteklenen Formatlardaki Fotoğrafları Kullanın!");
            }

        } else {
            return redirect()->back();
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
            $gallery = projectGallery::where("id", functionController::security($id))->get();
            if ($gallery[0]["id"]) {
                $delete = projectGallery::where("id", functionController::security($id))->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Fotoğraf Başarı ile Silindi.");
                } else {
                    return redirect()->back()->with("status", "Fotoğraf ile Silinemedi.");
                }
            }
        }
    }
}
