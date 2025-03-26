<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\category;
use App\Models\contact;
use App\Models\product;
use App\Models\productGallery;
use App\Models\project;
use App\Models\projectGallery;
use App\Models\services;
use App\Models\setting;
use Illuminate\Http\Request;

class indexENController extends Controller
{
    public function indexEN()
    {
        $category=category::all();
        return View("front.en.index",["category"=>$category]);
    }

    public function aboutEN()
    {
        return View("front.en.business.about");
    }

    public function missionEN()
    {
        return View("front.en.business.mission");
    }

    public function visionEN()
    {
        return View("front.en.business.vision");
    }


    public function kvkkEN()
    {
        return View("front.en.business.kvkk");
    }

    public function qualityPolicyEN()
    {
        return View("front.en.business.qualityPolicy");
    }


    public function productEN(Request $request)
    {
        if (isset($request->id)) {
            $id = functionController::security($request->id);
            $category = category::find($id);
            if (isset($category->id)) {
                $product=product::where("categoryId",$category->id)->get();
                return View("front.en.product.index",["product"=>$product,"isCategory"=>0]);
            }else{
                return redirect(route("indexHtmlTR"));
            }
        } else {
            $category = category::all();
            return View("front.en.product.index",["category"=>$category,"isCategory"=>1]);
        }
    }

    public function productDetailEN(Request $request)
    {
        if (isset($request->id)) {
            $id = functionController::security($request->id);
            $getProduct = product::find($id);
            if (isset($getProduct->id)) {
                $getGallery = productGallery::where("productId", $id)->get();
                return View("front.en.product.detail", ["product" => $getProduct, "gallery" => $getGallery]);
            } else {
                return redirect(route("indexHtmlTR"));
            }
        }
    }

    public function referenceEN()
    {
        return View("front.en.reference");
    }

    public function contactEN()
    {
        return View("front.en.contact");
    }

    public function contactPostEN(Request $request)
    {
        $request->validate(array(
            "name" => "required|max:50",
            "email" => "required|email",
            "subject" => "required|max:100",
            "message" => "required|max:250"
        ), array(
            "name.required" => "İsim Alanı Boş Bırakılamaz", "name.max" => "İsim Alanı 50 karakterden fazla olamaz.",
            "email.required" => "E-Posta alanı boş bırakılamaz.", "email.email" => "E-Posta alanına E-Posta girilmelidir.",
            "subject.required" => "Konu alanı boş bırakılamaz.", "subject.max" => "Konu en fazla 100 karakterden oluşmalıdır.",
            "message.required" => "Mesaj alanı boş bırakılamaz", "message.max" => "Mesaj alanı en fazla 250 karakter olmalıdır."
        ));


        $name = functionController::security($request->name);
        $email = functionController::security($request->email);
        $subject = functionController::security($request->subject);
        $message = functionController::security($request->message);

        $all = [
            "name" => $name,
            "email" => $email,
            "subject" => $subject,
            "message" => $message
        ];

        $create = contact::create($all);
        if ($create->id) {
            return redirect()->back()->with("status", "Mesajınız Başarıyla iletildi. En kısa zamanda dönüş yapılacaktır.");
        } else {
            return redirect()->back()->with("status", "Mesajınız iletilemedi. Lütfen tekrar deneyin.");
        }
    }


    // Sitemap Start
    public function sitemap()
    {
        header('Content-type: Application/xml; charset="utf8"', true);
        $xml_path = setting::getSetting("siteUrl") . "/sitemap.xml";
        define("PATH", setting::getSetting("siteUrl"));

        $xml_output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xml_output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml_output .= "<url><loc>" . PATH . "/</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/index</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/index.html</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/hakkimda</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/hakkimda.html</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/misyon</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/misyon.html</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/vizyon</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/vizyon.html</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/urunler</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/urunler.html</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/iletisim</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output .= "<url><loc>" . PATH . "/iletisim.html</loc><lastmod>" . date("Y-m-d") . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";



        $product = product::get();
        foreach ($product as $productWrite) {
            $xml_output .= "<url><loc>" . PATH . "/urundetay/" . $productWrite->id . "-" . functionController::seo($productWrite->title) . ".html" . "</loc><lastmod>" . substr($productWrite->created_at, 0, 11) . "</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        }


        $xml_output .= "</urlset>";


        print_r($xml_output);
    }

    // Sitemap Finish

}
