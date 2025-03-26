<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faq extends Model
{
    protected $table = "faq";
    protected $guarded = [];


    public static function getAbout($text)
    {
        if (isset($text)){
            $setting=faq::limit(1)->get();
            return $setting[0][$text];
        }
    }

}
