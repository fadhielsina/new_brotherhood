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
        Schema::create('cms_abouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->longText('section_title');
            $table->longText('section_body');
            $table->string('section_img');
            $table->longText('section_title_dua');
            $table->longText('section_subtitle');
            $table->longText('section_subbody');
            $table->longText('section_subtitle_dua');
            $table->longText('section_subbody_dua');
            $table->longText('section_subtitle_tiga');
            $table->longText('section_subbody_tiga');
            $table->longText('section_subtitle_empat');
            $table->longText('section_subbody_empat');
            $table->longText('section_subtitle_lima');
            $table->longText('section_subbody_lima');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_abouts');
    }
};
