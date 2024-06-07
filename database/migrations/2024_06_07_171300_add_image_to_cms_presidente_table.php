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
        Schema::table('cms_el_presidentes', function (Blueprint $table) {
            $table->string('section_img_dua');
            $table->string('section_img_tiga');
            $table->string('section_img_empat');
            $table->string('section_img_lima');
            $table->string('section_img_enam');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cms_el_presidentes', function (Blueprint $table) {
            //
        });
    }
};
