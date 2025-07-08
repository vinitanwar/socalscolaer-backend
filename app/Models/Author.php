<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Author extends Model
{
  
     protected $table="authors";
     protected $fillable=[
        "name",
        "slug",
        "about_author",
        "cv",
        "image",
      
     ];



     public function setNameAttribute($value){
     $this->attributes["name"]= $value;
     $this->attributes["slug"]=  Str::slug($value);
     }



}
