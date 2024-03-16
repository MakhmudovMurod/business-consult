<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('desktop_image');
            $table->string('mobile_image')->nullable();
            $table->string('title_ru');
            $table->string('title_uz')->nullable();
            $table->string('title_en')->nullable();
            $table->longText('subtitle_ru');
            $table->longText('subtitle_uz')->nullable();
            $table->longText('subtitle_en')->nullable();
            $table->string('more_details_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
