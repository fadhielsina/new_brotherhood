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
        Schema::create('cms_for_indonesia_cultures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->longText('section_title');
            $table->longText('section_body');
            $table->string('section_img');

            $table->longText('section_body_dua');
            $table->string('section_img_dua');

            $table->longText('section_body_tiga');

            $table->string('section_img_empat');
            $table->string('section_img_empat_satu');
            $table->string('section_img_empat_dua');
            $table->string('section_img_empat_tiga');
            $table->string('section_img_empat_empat');
            $table->string('section_img_empat_lima');
            $table->string('section_img_empat_enam');
            $table->string('section_img_empat_tujuh');

            $table->integer('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_for_indonesia_cultures');
    }
};
