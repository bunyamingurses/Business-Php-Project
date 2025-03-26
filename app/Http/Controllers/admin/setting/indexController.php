<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\about;
use App\Models\carousel;
use App\Models\process;
use App\Models\processGallery;
use App\Models\reference;
use App\Models\setting;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting=setting::find(1);
        return View("admin.setting.index",["setting"=>$setting]);
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
        //
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
    public function update(Request $request)
    {

        $update = setting::find(1);
        if (isset($request->icon)) {

            $icon = functionController::imageCreate($request, "setting", "icon");
            $update->icon = $icon;
        }


        if (isset($request->logoHeader)) {
            $logoHeader = functionController::imageCreate($request, "setting", "logoHeader");
            $logoHeaderAvif = functionController::imageCreateAvif($request, "setting", "logoHeader");
            $update->logoHeader = $logoHeader;
            $update->logoHeaderAvif = $logoHeaderAvif;
        }

        if (isset($request->logoFooter)) {
            $logoFooter = functionController::imageCreate($request, "setting", "logoFooter");
            $logoFooterAvif = functionController::imageCreateAvif($request, "setting", "logoFooter");
            $update->logoFooter = $logoFooter;
            $update->logoFooterAvif = $logoFooterAvif;
        }

        if (isset($request->siteUrl)) {
            $siteUrl = functionController::security($request->siteUrl);
            $update->siteUrl = $siteUrl;
        }

        if (isset($request->siteTitle)) {
            $siteTitle = functionController::security($request->siteTitle);
            $update->title = $siteTitle;
        }

        if (isset($request->siteDescription)) {
            $siteDescription = functionController::security($request->siteDescription);
            $update->description = $siteDescription;
        }

        if (isset($request->siteKeyword)) {
            $siteKeyword = functionController::security($request->siteKeyword);
            $update->keyword = $siteKeyword;
        }

        if (isset($request->siteAuthor)) {
            $siteAuthor = functionController::security($request->siteAuthor);
            $update->author = $siteAuthor;
        }

        if (isset($request->sitePhoneNumber)) {
            $sitePhoneNumber = functionController::security($request->sitePhoneNumber);
            $update->phoneNumber = $sitePhoneNumber;
        }

        if (isset($request->siteEmail)) {
            $siteEmail = functionController::security($request->siteEmail);
            $update->email = $siteEmail;
        }

        if (isset($request->address)) {
            $address = functionController::security($request->address);
            $update->address = $address;
        }

        if (isset($request->workingHours)) {
            $workingHours = functionController::security($request->workingHours);
            $update->workingHours = $workingHours;
        }

        if (isset($request->facebook)) {
            $facebook = functionController::security($request->facebook);
            $update->facebook = $facebook;
        }

        if (isset($request->twitter)) {
            $twitter = functionController::security($request->twitter);
            $update->twitter = $twitter;
        }

        if (isset($request->instagram)) {
            $instagram = functionController::security($request->instagram);
            $update->instagram = $instagram;
        }

        if (isset($request->linkedin)) {
            $linkedin = functionController::security($request->linkedin);

            $update->linkedin = $linkedin;
        }

        if ($update != null) {
            if ($update->save()) {
                return redirect()->back()->with("status","Ayarlar Güncellendi.");
            }else{
                return redirect()->back()->with("status","Ayarlar Güncellenemedi");
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function about()
    {
        $about=about::find(1);
        return View("admin.setting.about",["about"=>$about]);
    }


    public function aboutPost(Request $request)
    {

        $about=about::find(1);

        if (isset($request->image)){
            $image=functionController::imageCreate($request,"setting","image");
            $imageAvif=functionController::imageCreateAvif($request,"setting","image");

            $about->aboutImage=$image;
            $about->aboutImageAvif=$imageAvif;
        }

        if (isset($request->imageBanner)){
            $image=functionController::imageCreate($request,"setting","imageBanner");
            $imageAvif=functionController::imageCreateAvif($request,"setting","imageBanner");

            $about->bannerImage=$image;
            $about->bannerImageAvif=$imageAvif;
        }

        if (isset($request->about)){
            $about2 = functionController::security($request->about);
            $about->about=$about2;
        }

        if (isset($request->aboutEnglish)){
            $about2English = functionController::security($request->aboutEnglish);
            $about->aboutEnglish=$about2English;
        }


        if ($about!=null){
            if ($about->save()){
                return redirect()->back()->with("status","Hakkımda Güncellendi.");
            }else{
                return redirect()->back()->with("status","Hakkımda Güncellenemedi");
            }

        }


    }

    public function mv()
    {
        $about=about::find(1);
        return View("admin.setting.missionvision",["about"=>$about]);
    }

    public function mvPost(Request $request)
    {
        $about=about::find(1);

        if (isset($request->mission)){
            $mission = functionController::security($request->mission);
            $about->mission=$mission;
        }

        if (isset($request->missionEnglish)){
            $missionEnglish = functionController::security($request->missionEnglish);
            $about->missionEnglish=$missionEnglish;
        }

        if (isset($request->vision)){
            $vision = functionController::security($request->vision);
            $about->vision=$vision;
        }

        if (isset($request->visionEnglish)){
            $visionEnglish = functionController::security($request->visionEnglish);
            $about->visionEnglish=$visionEnglish;
        }


        if ($about!=null){
            if ($about->save()){
                return redirect()->back()->with("status","Misyon - Vizyon Güncellendi.");
            }else{
                return redirect()->back()->with("status","Misyon - Vizyon Güncellenemedi");
            }

        }
    }


    public function kvkk()
    {
        $about=about::find(1);
        return View("admin.setting.kvkk",["about"=>$about]);
    }

    public function kvkkPost(Request $request)
    {
        $about=about::find(1);


        if (isset($request->kvkk)){
            $kvkk = functionController::security($request->kvkk);
            $about->kvkk=$kvkk;
        }

        if (isset($request->kvkkEnglish)){
            $kvkkEnglish = functionController::security($request->kvkkEnglish);
            $about->kvkkEnglish=$kvkkEnglish;
        }


        if ($about!=null){
            if ($about->save()){
                return redirect()->back()->with("status","KVKK Güncellendi.");
            }else{
                return redirect()->back()->with("status","KVKK Güncellenemedi");
            }

        }
    }


    public function qualityPolicy()
    {
        $about=about::find(1);
        return View("admin.setting.qualityPolicy",["about"=>$about]);
    }

    public function qualityPolicyPost(Request $request)
    {
        $about=about::find(1);


        if (isset($request->qualityPolicy)){
            $qualityPolicy = functionController::security($request->qualityPolicy);
            $about->qualityPolicy=$qualityPolicy;
        }

        if (isset($request->qualityPolicyEnglish)){
            $qualityPolicyEnglish = functionController::security($request->qualityPolicyEnglish);
            $about->qualityPolicyEnglish=$qualityPolicyEnglish;
        }


        if ($about!=null){
            if ($about->save()){
                return redirect()->back()->with("status","Kalite Politikası Güncellendi.");
            }else{
                return redirect()->back()->with("status","Kalite Politikası Güncellenemedi");
            }

        }
    }

    public function reference()
    {
        $reference=reference::get();
        return View("admin.setting.reference",["reference"=>$reference]);
    }


    public function referencePost(Request $request)
    {
        $all=[];

        if ($request->File("foto") != null) {
            $images = functionController::imageCreateAvif($request,"reference","foto");
            $all+=[
                "image"=>$images,
            ];
        }

        if (isset($request->name)!=null){
            $name=functionController::security($request->name);
            $all+=["name"=>$name];
        }

        if ($all!=null && $all!=""){
            $create=reference::create($all);
            if ($create){
                return redirect()->back()->with("status","İş Ortağı Eklendi.");
            }else{
                return redirect()->back()->with("status","İş Ortağı Eklenemedi.");
            }
        }
    }

    public function referenceDestroy($id)
    {
        if (isset($id)){
            $reference=reference::find(functionController::security($id));
            if (isset($reference->id)){
                $reference->delete();
                return redirect()->back()->with("status","İş Ortağı Silindi.");
            }else{
                return redirect(route("admin.index"));
            }
        }
    }

}
