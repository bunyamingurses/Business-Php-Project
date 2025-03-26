<?php

namespace App\Http\Controllers\admin\faq;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\faq;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faq = faq::all();
        return View("admin.faq.index", ["faq" => $faq]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View("admin.faq.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->title) != null && isset($request->titleEnglish) != null && isset($request->description) != null && isset($request->descriptionEnglish) != null) {
            $name = functionController::security($request->title);
            $nameEnglish = functionController::security($request->titleEnglish);
            $description = functionController::security($request->description);
            $descriptionEnglish = functionController::security($request->descriptionEnglish);

            $all = [
                "name" => $name,
                "nameEnglish" => $nameEnglish,
                "text" => $description,
                "textEnglish" => $descriptionEnglish
            ];

            $create = faq::create($all);
            if ($create != null) {
                return redirect()->back()->with("status", "Soru Başarıyla Eklendi.");
            } else {
                return redirect()->back()->with("status", "Soru Eklenendi.");
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
            $id = functionController::security($id);
            $faq = faq::find($id);
            if ($faq->id != null) {
                return View("admin.faq.edit", ["faq" => $faq]);
            } else {
                return redirect()->back();
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if (isset($request->id) && isset($request->title) != null && isset($request->titleEnglish) != null && isset($request->description) != null && isset($request->descriptionEnglish) != null) {
            $faq = faq::find(functionController::security($request->id));
            $faq->name = functionController::security($request->title);
            $faq->nameEnglish = functionController::security($request->titleEnglish);
            $faq->text = functionController::security($request->description);
            $faq->textEnglish = functionController::security($request->descriptionEnglish);

            if ($faq->save()) {
                return redirect()->back()->with("status", "Soru Başarıyla Güncellendi.");
            } else {
                return redirect()->back()->with("status", "Soru Güncellenemedi.");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)){
            faq::where("id",functionController::security($id))->delete();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
