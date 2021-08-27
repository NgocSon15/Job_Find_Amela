<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('fullname');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('address')->nullable();
            $table->date('birth')->nullable();
            $table->integer('sex')->nullable();
            $table->integer('marry')->nullable();
            $table->string('follow')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
