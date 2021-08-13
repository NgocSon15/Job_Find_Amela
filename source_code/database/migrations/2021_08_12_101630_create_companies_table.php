<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('company_id')->autoIncrement();
            $table->integer('user_id');
            $table->string('fullname');
            $table->string('tax_code');
            $table->string('email');
            $table->string('logo');
            $table->integer('city_id');
            $table->integer('employee');
            $table->string('website');
            $table->string('phone');
            $table->tinyInteger('status');
            $table->tinyInteger('is_suggest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
