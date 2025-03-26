<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\contact;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $contact=contact::get();
        return View("admin.index",["contact"=>$contact]);
    }


    public function contactDestroy($id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $contact = contact::find($id);
            if ($contact->id) {
                $delete = $contact->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Silme İşlemi Başarılı.");
                } else {
                    return redirect()->back()->with("status", "Silme İşlemi Gerçekleştirilemedi. Lütfen Tekrar Deneyin..");
                }
            }
        }
    }


}
