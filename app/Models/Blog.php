<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
protected $table="blogs";
protected $fillable=[
    "banner",
    "blog_cat",
    "title",
    "slug",
    "blog_editor",
    "blog_dis"
];

protected $casts=[
    "blog_dis"=>"array",
];

public function setTitleAttribute($value){
    $this->attributes["title"]=$value;
    $this->attributes["slug"]=Str::slug($value);
}



}
