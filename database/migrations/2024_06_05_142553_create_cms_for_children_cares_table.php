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
        Schema::create('cms_for_children_cares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->longText('section_title');
            $table->longText('section_body');
            $table->longText('section_title_dua');
            $table->longText('section_body_dua');

            $table->string('section_img');
            $table->string('section_img_dua');
            $table->string('section_img_tiga');
            $table->string('section_img_empat');
            $table->string('section_img_lima');
            $table->string('section_img_enam');
            $table->string('section_img_tujuh');

            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_for_children_cares');
    }
};
