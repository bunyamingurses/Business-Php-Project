<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin;
use App\Http\Controllers\front;
use App\Http\Controllers\login;

// Route TR Start
Route::get("/",[front\indexTRController::class,"indexTR"])->name("indexTR");
Route::get("/index.html",[front\indexTRController::class,"indexTR"])->name("indexHtmlTR");

Route::get("/hakkimda",[front\indexTRController::class,"aboutTR"])->name("aboutTR");
Route::get("/hakkimda.html",[front\indexTRController::class,"aboutTR"])->name("aboutHtmlTR");
Route::get("/misyon",[front\indexTRController::class,"missionTR"])->name("missionTR");
Route::get("/misyon.html",[front\indexTRController::class,"missionTR"])->name("missionHtmlTR");
Route::get("/vizyon",[front\indexTRController::class,"visionTR"])->name("visionTR");
Route::get("/vizyon.html",[front\indexTRController::class,"visionTR"])->name("visionHtmlTR");
Route::get("/kvkk",[front\indexTRController::class,"kvkkTR"])->name("kvkkTR");
Route::get("/kvkk.html",[front\indexTRController::class,"kvkkTR"])->name("kvkkHtmlTR");
Route::get("/kalitepolitikasi",[front\indexTRController::class,"qualityPolicyTR"])->name("qualityPolicyTR");
Route::get("/kalitepolitikasi.html",[front\indexTRController::class,"qualityPolicyTR"])->name("qualityPolicyHtmlTR");


Route::get("/urunler",[front\indexTRController::class,"productTR"])->name("productTR");
Route::get("/urunler.html",[front\indexTRController::class,"productTR"])->name("productHtmlTR");
Route::get("/urunler/{id}-{name}",[front\indexTRController::class,"productTR"])->name("productCategoryTR");
Route::get("/urunler/{id}-{name}.html",[front\indexTRController::class,"productTR"])->name("productCategoryHtmlTR");
Route::get("/urundetay/{id}-{name}",[front\indexTRController::class,"productDetailTR"])->name("productDetailTR");
Route::get("/urundetay/{id}-{name}.html",[front\indexTRController::class,"productDetailTR"])->name("productDetailHtmlTR");

Route::get("/iletisim",[front\indexTRController::class,"contactTR"])->name("contactTR");
Route::get("/iletisim.html",[front\indexTRController::class,"contactTR"])->name("contactHtmlTR");
Route::post("/iletisim",[front\indexTRController::class,"contactPostTR"])->name("contactPostTR");

Route::get("/sitemap",[front\indexTRController::class,"sitemap"]);
Route::get("/sitemap.xml",[front\indexTRController::class,"sitemap"]);
// Route TR End





// Route EN Start
Route::get("/en/",[front\indexENController::class,"indexEN"])->name("indexEN");
Route::get("/en/index.html",[front\indexENController::class,"indexEN"])->name("indexHtmlEN");

Route::get("/en/about",[front\indexENController::class,"aboutEN"])->name("aboutEN");
Route::get("/en/about.html",[front\indexENController::class,"aboutEN"])->name("aboutHtmlEN");
Route::get("/en/mission",[front\indexENController::class,"missionEN"])->name("missionEN");
Route::get("/en/mission.html",[front\indexENController::class,"missionEN"])->name("missionHtmlEN");
Route::get("/en/vision",[front\indexENController::class,"visionEN"])->name("visionEN");
Route::get("/en/vision.html",[front\indexENController::class,"visionEN"])->name("visionHtmlEN");
Route::get("/en/kvkk",[front\indexENController::class,"kvkkEN"])->name("kvkkEN");
Route::get("/en/kvkk.html",[front\indexENController::class,"kvkkEN"])->name("kvkkHtmlEN");
Route::get("/en/qualitypolicy",[front\indexENController::class,"qualityPolicyEN"])->name("qualityPolicyEN");
Route::get("/en/qualitypolicy.html",[front\indexENController::class,"qualityPolicyEN"])->name("qualityPolicyHtmlEN");



Route::get("/en/products",[front\indexENController::class,"productEN"])->name("productEN");
Route::get("/en/products.html",[front\indexENController::class,"productEN"])->name("productHtmlEN");
Route::get("/en/products/{id}-{name}",[front\indexENController::class,"productEN"])->name("productCategoryEN");
Route::get("/en/products/{id}-{name}.html",[front\indexENController::class,"productEN"])->name("productCategoryHtmlEN");
Route::get("/en/productdetail/{id}-{name}",[front\indexENController::class,"productDetailEN"])->name("productDetailEN");
Route::get("/en/productdetail/{id}-{name}.html",[front\indexENController::class,"productDetailEN"])->name("productDetailHtmlEN");

Route::get("/en/contact",[front\indexENController::class,"contactEN"])->name("contactEN");
Route::get("/en/contact.html",[front\indexENController::class,"contactEN"])->name("contactHtmlEN");
Route::post("/en/contact",[front\indexENController::class,"contactPostEN"])->name("contactPostEN");

Route::get("/en/sitemap",[front\indexENController::class,"sitemap"]);
Route::get("/en/sitemap.xml",[front\indexENController::class,"sitemap"]);

// Route EN End



// Login Route Start
Route::prefix("login")->as("login.")->group(function () {
    Route::get("/", [login\indexController::class, "index"])->name("index");
    Route::get("/index", [login\indexController::class, "index"])->name("index");
    Route::post("/create", [login\indexController::class, "login"])->name("loginPost");
    Route::get("/logout", [login\indexController::class, "logOut"])->name("logOut");

});
// Login Route Finish



Route::prefix("admin")->as("admin.")->middleware("loginControl")->group(function () {
    Route::get("/", [admin\indexController::class, "index"])->name("index");
    Route::get("/contactdestroy/{id}", [admin\indexController::class, "contactDestroy"])->name("contactDestroy");

    Route::prefix("profile")->as("profile.")->group(function () {
        Route::get("/", [admin\profile\indexController::class, "index"])->name("index");
        Route::post("/update", [admin\profile\indexController::class, "save"])->name("update");
    });

    Route::prefix("/setting")->as("setting.")->group(function () {
        Route::get("/", [admin\setting\indexController::class, "index"])->name("index");
        Route::post("/update", [admin\setting\indexController::class, "update"])->name("update");

        Route::get("/about", [admin\setting\indexController::class, "about"])->name("about");
        Route::post("/aboutpost", [admin\setting\indexController::class, "aboutPost"])->name("aboutPost");

        Route::get("/missionvision", [admin\setting\indexController::class, "mv"])->name("missionvision");
        Route::post("/missionvisionpost", [admin\setting\indexController::class, "mvPost"])->name("missionvisionPost");

        Route::get("/kvkk", [admin\setting\indexController::class, "kvkk"])->name("kvkk");
        Route::post("/kvkk", [admin\setting\indexController::class, "kvkkPost"])->name("kvkkPost");

        Route::get("/qualityPolicy", [admin\setting\indexController::class, "qualityPolicy"])->name("qualityPolicy");
        Route::post("/qualityPolicy", [admin\setting\indexController::class, "qualityPolicyPost"])->name("qualityPolicyPost");


        Route::get("/reference.html", [admin\setting\indexController::class, "reference"])->name("reference");
        Route::post("/reference", [admin\setting\indexController::class, "referencePost"])->name("referencePost");
        Route::get("/referencedestroy/{id}", [admin\setting\indexController::class, "referenceDestroy"])->name("referenceDestroy");

    });



    Route::prefix("service")->as("service.")->group(function () {
        Route::get("/", [admin\services\indexController::class, "index"])->name("index");
        Route::get("/create", [admin\services\indexController::class, "create"])->name("create");
        Route::post("/create", [admin\services\indexController::class, "store"])->name("store");
        Route::get("/edit/{id}", [admin\services\indexController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [admin\services\indexController::class, "update"])->name("update");
        Route::get("/destroy/{id}", [admin\services\indexController::class, "destroy"])->name("destroy");
        Route::get("/popular/{id}", [admin\services\indexController::class, "popular"])->name("popular");
    });

    Route::prefix("faq")->as("faq.")->group(function () {
        Route::get("/", [admin\faq\indexController::class, "index"])->name("index");
        Route::get("/create", [admin\faq\indexController::class, "create"])->name("create");
        Route::post("/create", [admin\faq\indexController::class, "store"])->name("store");
        Route::get("/edit/{id}", [admin\faq\indexController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [admin\faq\indexController::class, "update"])->name("update");
        Route::get("/destroy/{id}", [admin\faq\indexController::class, "destroy"])->name("destroy");
    });

    Route::prefix("category")->as("category.")->group(function () {
        Route::get("/", [admin\category\indexController::class, "index"])->name("index");
        Route::get("/create", [admin\category\indexController::class, "create"])->name("create");
        Route::post("/create", [admin\category\indexController::class, "store"])->name("store");
        Route::get("/edit/{id}", [admin\category\indexController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [admin\category\indexController::class, "update"])->name("update");
        Route::get("/destroy/{id}", [admin\category\indexController::class, "destroy"])->name("destroy");
        Route::get("/popular/{id}", [admin\category\indexController::class, "popular"])->name("popular");
    });

    Route::prefix("product")->as("product.")->group(function () {
        Route::get("/", [admin\product\indexController::class, "index"])->name("index");
        Route::get("/create", [admin\product\indexController::class, "create"])->name("create");
        Route::post("/create", [admin\product\indexController::class, "store"])->name("store");
        Route::get("/edit/{id}", [admin\product\indexController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [admin\product\indexController::class, "update"])->name("update");
        Route::get("/destroy/{id}", [admin\product\indexController::class, "destroy"])->name("destroy");
        Route::get("/popular/{id}", [admin\product\indexController::class, "popular"])->name("popular");

        Route::prefix("gallery")->as("gallery.")->group(function () {
            Route::get("/index/{id}", [admin\product\gallery\indexController::class, "index"])->name("index");
            Route::post("/create", [admin\product\gallery\indexController::class, "store"])->name("store");
            Route::get("/destroy/{id}", [admin\product\gallery\indexController::class, "destroy"])->name("destroy");
        });
    });

    Route::prefix("project")->as("project.")->group(function () {
        Route::get("/", [admin\project\indexController::class, "index"])->name("index");
        Route::get("/create", [admin\project\indexController::class, "create"])->name("create");
        Route::post("/create", [admin\project\indexController::class, "store"])->name("store");
        Route::get("/edit/{id}", [admin\project\indexController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [admin\project\indexController::class, "update"])->name("update");
        Route::get("/destroy/{id}", [admin\project\indexController::class, "destroy"])->name("destroy");
        Route::get("/popular/{id}", [admin\project\indexController::class, "popular"])->name("popular");

        Route::prefix("gallery")->as("gallery.")->group(function () {
            Route::get("/index/{id}", [admin\project\gallery\indexController::class, "index"])->name("index");
            Route::post("/create", [admin\project\gallery\indexController::class, "store"])->name("store");
            Route::get("/destroy/{id}", [admin\project\gallery\indexController::class, "destroy"])->name("destroy");
        });
    });

});
