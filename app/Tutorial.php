<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutorial extends Model
{
    use SoftDeletes;
    protected $fillable = ["title","cat_id","video_link","content"];

    function catname(){
        return $this->hasOne("\App\Category","id","cat_id");
    }
}
