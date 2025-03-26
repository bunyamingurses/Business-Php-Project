<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table="category";
    protected $guarded=[];


    public static function getName($id)
    {
        $category=category::find($id);
        return $category->name;
    }

    public static function getNameEnglish($id)
    {
        $category=category::find($id);
        return $category->nameEnglish;
    }
}
