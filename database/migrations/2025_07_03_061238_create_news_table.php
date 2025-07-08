<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    
             Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique();
            $table->string("slug")->unique();
            $table->string("image");
            $table->string("news_type");
            $table->string("color");
            $table->string("editor");

            $table->integer("views")->default(0);
            $table->integer( "likes")->default(0);
             $table->json("des");
            $table->enum("numbering", ["first", "second", "third"])->nullable()->unique();
            $table->json("allimages")->nullable();
             $table->string('region')->nullable();
            $table->timestamps();
        });
        
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::dropIfExists('news');
    }
};
