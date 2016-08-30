<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name', 120)->unique();
            $table->integer('industry_id')->unsigned();
            $table->string('profile_img')->nullable();
            $table->string('header_img')->nullable();
            $table->string('desc', 2000)->nullable();
            $table->string('size', 20)->nullable();
            $table->boolean('female_owned')->nullable();
            $table->boolean('freelance')->nullable();
            $table->boolean('organization')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('industry_id')->references('id')->on('industries');
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
        Schema::drop('companies');
    }
}
