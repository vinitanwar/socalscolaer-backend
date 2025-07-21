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
        Schema::table('authors', function (Blueprint $table) {
       if(  !Schema::hasColumn("authors","author_type")){
$table->enum("author_type",["editor","author","advisory"])->nullable();
       }
       if(!Schema::hasColumn("authors","inboard")){
        $table->boolean("inboard")->default(false);
       }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('authors', function (Blueprint $table) {
           if(Schema::hasColumn("authors","author_type")){
            $table->dropColumn("author_type");
           }
           if(Schema::hasColumn("authors","inboard")){
$table->dropColumn("inboard");
           }
        });
    }
};
