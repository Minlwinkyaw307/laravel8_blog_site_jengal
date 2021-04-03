<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_configs', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('google');
            $table->string('github');
            $table->longText('policy');
            $table->longText('about');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->text('contact_message');

            $table->softDeletes();
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
        Schema::dropIfExists('site_configs');
    }
}
