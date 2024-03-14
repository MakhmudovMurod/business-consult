<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('instagram_link');
            $table->string('telegram_link');
            $table->string('facebook_link');
            $table->string('company_phone');
            $table->string('company_email');
            $table->longText('company_description_uz');
            $table->longText('company_description_ru');
            $table->longText('company_description_en');
            $table->longText('about_company_uz');
            $table->longText('about_company_ru');
            $table->longText('about_company_en');
            $table->mediumText('company_address_uz');
            $table->mediumText('company_address_ru');
            $table->mediumText('company_address_en');
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
        Schema::dropIfExists('informations');
    }
}
