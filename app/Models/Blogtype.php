<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogtype extends Model
{
    protected $table="blogtypes";
    protected $fillable=[
        "blogtype",
        "blogtypeimage"
    ];
    
}
