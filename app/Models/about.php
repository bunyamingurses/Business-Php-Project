<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    protected $table = "about";
    protected $guarded = [];


    public static function getAbout($text)
    {
        if (isset($text)){
            $setting=about::limit(1)->first();
            return $setting->$text;
        }
    }

}
