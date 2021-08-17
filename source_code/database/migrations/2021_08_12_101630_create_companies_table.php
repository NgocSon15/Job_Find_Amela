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
            $table->string('fullname');
            $table->string('shortname');
            $table->string('tax_code');
            $table->string('company_code');
            $table->string('email');
            $table->string('address');
            $table->string('map')->nullable();
            $table->string('logo');
            $table->tinyInteger('field_id')->nullable();
            $table->longText('description');
            $table->tinyInteger('city_id')->nullable();
            $table->tinyInteger('size_id')->nullable();
            $table->string('website')->nullable();
            $table->string('phone');
            $table->tinyInteger('status')->default('0');
            $table->integer('total_jobs')->default('0');
            $table->integer('total_employee')->default('0');
            $table->tinyInteger('is_suggest')->default('0');
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
