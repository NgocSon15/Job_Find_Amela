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
            $table->integer('job_id')->autoIncrement();
            $table->integer('company_id');
            $table->string('job_title');
            $table->string('job_description');
            $table->integer('category_id');
            $table->string('min_salary');
            $table->string('max_salary');
            $table->string('work_location');
            $table->string('job_level');
            $table->string('experiences');
            $table->date('expiration');
            $table->tinyInteger('position_type');
            $table->tinyInteger('gender');
            $table->tinyInteger('status');
            $table->tinyInteger('hot_job');
            $table->tinyInteger('is_suggest');
            $table->integer('view');
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
