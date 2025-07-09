<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
  protected $table="internships";
  protected $fillable=[
"name",
"subject",
"email",
"phone",
"message",
];

}
