<?php

namespace App\Models;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class News extends Model
{
 protected $table="news";
    
    protected $fillable = [
        'title',
        'slug',
        'image',
        'news_type',
        'color',
        'editor',
        'views',
        'likes',
        'des',
        "region",
        "allimages",
        "numbering",
        "readingtime"
        
    ];

    protected $casts = [
        'des' => 'array',
        'allimages' => 'array'
       
    ];

public function setSlugAttribute($value){
if($value){
$this->attributes["slug"]=$value;
}else{
          $this->attributes['slug'] = time();

}
}
    public function setTitleAttribute($value){
      $this->attributes['title'] = $value;
    }
}
