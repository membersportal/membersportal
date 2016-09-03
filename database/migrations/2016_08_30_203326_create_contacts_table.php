<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->integer('company_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('phone_no')->unsigned()->nullable();
            $table->string('address_line_1', 50)->nullable();
            $table->string('address_line_2', 50)->nullable();
            $table->string('address_line_3', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->char('state', 2)->nullable();
            $table->integer('zip')->unsigned()->nullable();
            $table->string('country', 15)->nullable();
            $table->url('website')->nullable();
            $table->string('twitter', 20)->nullable();
            $table->string('facebook', 20)->nullable();
            $table->string('instagram', 20)->nullable();
            $table->string('linkedin', 20)->nullable();
            $table->string('google_plus', 20)->nullable();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}
