<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();    
            $table->string('project_title',100)->nullable();
            $table->date('deadline')->nullable();
            $table->string('contact_name', 100)->nullable();
            $table->string('contact_department', 100)->nullable();
            $table->string('contact_no', 20)->nullable();
            $table->text('project_scope')->nullable();
            $table->date('contract_from_date')->nullable();
            $table->date('contact_to_date')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('company');
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
        Schema::drop('rfps');
    }
}