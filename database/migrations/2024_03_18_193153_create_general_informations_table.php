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
            $table->string('small_logo')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('telegram_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('big_logo')->nullable();
            $table->longText('footer_description')->nullable();
            $table->string('phone_number')->nullable();
            $table->longText('address_ru')->nullable();
            $table->longText('address_uz')->nullable();
            $table->longText('address_en')->nullable();
            $table->string('email')->nullable();
            $table->longText('about_text_ru')->nullable();
            $table->longText('about_text_uz')->nullable();
            $table->longText('about_text_en')->nullable();
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
