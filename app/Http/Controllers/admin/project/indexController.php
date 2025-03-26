<?php

namespace App\Http\Controllers\admin\project;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\project;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = project::get();
        return View("admin.project.index", ["project" => $project]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.project.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->projectTitle) || isset($request->projectDescription) || isset($request->projectTitleEnglish) || isset($request->projectDescriptionEnglish) || isset($request->foto)) {
            $all = [];
            if (isset($request->projectTitle)) {
                $title = functionController::security($request->projectTitle);
                $all += [
                    "title" => $title,
                ];
            }

            if (isset($request->projectDescription)) {
                $description = functionController::security($request->projectDescription);
                $all += [
                    "text" => $description,
                ];
            }

            if (isset($request->projectTitleEnglish)) {
                $title = functionController::security($request->projectTitleEnglish);
                $all += [
                    "titleEnglish" => $title,
                ];
            }

            if (isset($request->projectDescriptionEnglish)) {
                $description = functionController::security($request->projectDescriptionEnglish);
                $all += [
                    "textEnglish" => $description,
                ];
            }

            if (isset($request->foto)) {
                if (functionController::resimTurKontrol($request->File("foto")->getClientOriginalExtension())) {
                    $image = functionController::imageCreate($request, "project", "foto");
                    $imageAvif = functionController::imageCreateAvif($request, "project", "foto");
                    $all += [
                        "images" => $image,
                        "imagesAvif" => $imageAvif,
                    ];
                } else {
                    return redirect()->back()->with("status", "Lütfen desteklenen biçimlerdeki fotoğrafları kullanın.");
                }
            }

            $create = project::create($all);
            if ($create) {
                return redirect()->back()->with("status", "Proje Başarı ile Eklendi.");
            } else {
                return redirect()->back()->with("status", "Proje Eklenemedi. Lütfen Tekrar Deneyin.");
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
            $project = project::where("id", functionController::security($id))->get();
            if ($project[0]["id"]) {
                return View("admin.project.edit", ["project" => $project]);
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
            $project = project::find(functionController::security($id));
            if (isset($project->id)) {

                if (isset($request->projectTitle) || isset($request->projectDescription) || isset($request->projectTitleEnglish) || isset($request->projectDescriptionEnglish) || isset($request->foto)) {
                    if (isset($request->projectTitle)) {
                        $title = functionController::security($request->projectTitle);
                        $project->title = $title;
                    }

                    if (isset($request->projectDescription)) {
                        $description = functionController::security($request->projectDescription);
                        $project->text = $description;
                    }

                    if (isset($request->projectTitleEnglish)) {
                        $title = functionController::security($request->projectTitleEnglish);
                        $project->titleEnglish = $title;
                    }

                    if (isset($request->projectDescriptionEnglish)) {
                        $description = functionController::security($request->projectDescriptionEnglish);
                        $project->textEnglish = $description;
                    }

                    if (isset($request->foto)) {
                        if (functionController::resimTurKontrol($request->File("foto")->getClientOriginalExtension())) {
                            $image = functionController::imageCreate($request, "project", "foto");
                            $imageAvif = functionController::imageCreateAvif($request, "project", "foto");
                            $project->images=$image;
                            $project->imagesAvif=$imageAvif;
                        } else {
                            return redirect()->back()->with("status", "Lütfen desteklenen biçimlerdeki fotoğrafları kullanın.");
                        }
                    }

                    $update = $project->save();
                    if ($update) {
                        return redirect()->back()->with("status", "Proje Başarı ile Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Proje Güncellenemedi. Lütfen Tekrar Deneyin.");
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
            $project = project::where("id", functionController::security($id))->get();
            if ($project[0]["id"]) {
                $delete = project::where("id", functionController::security($id))->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Proje Başarı ile Silindi.");
                } else {
                    return redirect()->back()->with("status", "Proje ile Silinemedi.");
                }
            }
        }
    }


    public function popular(string $id)
    {
        if (isset($id)) {
            $project = project::where("id", functionController::security($id))->get();
            if ($project[0]["id"]) {
                if ($project[0]["isPopular"] == 1) {
                    $all = ["isPopular" => 0];
                    $update = project::where("id", functionController::security($id))->update($all);
                    if ($update) {
                        return redirect()->back()->with("status", "Proje Başarı ile Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Proje ile Güncellenemedi.");
                    }
                } else {
                    $all = ["isPopular" => 1];
                    $update = project::where("id", functionController::security($id))->update($all);
                    if ($update) {
                        return redirect()->back()->with("status", "Proje Başarı ile Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Proje Güncellenemedi.");
                    }
                }


            }
        }
    }


}
