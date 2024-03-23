<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('small_logo');
            $table->string('instagram_link')->nullable();
            $table->string('telegram_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('big_logo');
            $table->longText('footer_description_uz');
            $table->longText('footer_description_ru');
            $table->longText('footer_description_en');
            $table->string('phone_number');
            $table->string('address_ru');
            $table->string('address_uz');
            $table->string('address_en');
            $table->string('email');
            $table->string('about_text_ru');
            $table->string('about_text_uz');
            $table->string('about_text_en');
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
        Schema::dropIfExists('general_informations');
    }
}
