<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('designation')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->string('email')->unique();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('relation_status')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('language')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
