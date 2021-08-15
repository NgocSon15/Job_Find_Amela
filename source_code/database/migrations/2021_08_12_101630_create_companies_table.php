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
            $table->string('company_code');
            $table->string('email');
            $table->string('address');
            $table->string('map');
            $table->string('logo');
            $table->integer('field_id');
            $table->string('description');
            $table->integer('city_id');
            $table->integer('size_id');
            $table->string('website');
            $table->string('phone');
            $table->tinyInteger('status');
            $table->integer('total_jobs');
            $table->integer('total_employee');
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
