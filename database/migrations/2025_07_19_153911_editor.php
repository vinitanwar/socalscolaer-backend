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
        Schema::table('news', function (Blueprint $table) {
        if(!Schema::hasColumn("news","editortogal")){
              $table->boolean("editortogal")->default(false);
}
if(!Schema::hasColumn("news","tags")){
                  $table->json("tags")->nullable();

}
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
           if (Schema::hasColumn('news', 'editortogal')) {
                $table->dropColumn('editortogal');
            }
             if (Schema::hasColumn('news', 'tags')) {
                $table->dropColumn('tags');
            }
        });
    }
};
