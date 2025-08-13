<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('about_sections', function (Blueprint $table) {
            // Ajout des champs pour la section 2
            $table->string('title_2')->nullable()->after('image_about');
            $table->text('paragraph_2')->nullable()->after('title_2');
            
            // Ajout des champs pour la section 3
            $table->string('title_3')->nullable()->after('paragraph_2');
            $table->text('paragraph_3')->nullable()->after('title_3');
        });
    }

    public function down()
    {
        Schema::table('about_sections', function (Blueprint $table) {
            $table->dropColumn([
                'title_2', 'paragraph_2',
                'title_3', 'paragraph_3'
            ]);
        });
    }
};