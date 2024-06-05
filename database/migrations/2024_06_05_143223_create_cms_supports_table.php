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
        Schema::create('cms_supports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->longText('section_title');
            $table->longText('section_body');
            $table->string('section_img');
            $table->string('section_img_satu');
            $table->string('section_img_dua');
            $table->string('section_img_tiga');
            $table->string('section_img_empat');
            $table->string('section_img_lima');
            $table->string('section_img_enam');
            $table->string('section_img_tujuh');
            $table->string('section_img_delapan');
            $table->string('section_img_sembilan');
            $table->string('section_img_sepuluh');
            $table->string('section_img_sebelas');
            $table->string('section_img_duabelas');
            $table->string('section_img_tigabelas');
            $table->string('section_img_empatbelas');
            $table->string('section_img_limabelas');

            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_supports');
    }
};
