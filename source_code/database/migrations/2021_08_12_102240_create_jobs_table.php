<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('company_id');
            $table->string('job_title');
            $table->longText('job_description');
            $table->string('skill_id');
            $table->string('job_code');
            $table->integer('category_id');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->string('work_location');
            $table->tinyInteger('job_type');
            $table->tinyInteger('experiences');
            $table->date('expiration');
            $table->tinyInteger('position_id');
            $table->tinyInteger('gender')->nullable();
            $table->integer('quantity');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_hot')->default(0);
            $table->tinyInteger('is_suggest')->default(0);
            $table->integer('view')->default(0);
            $table->string('reference_ids')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
