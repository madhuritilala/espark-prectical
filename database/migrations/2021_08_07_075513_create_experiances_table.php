<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('company_address')->nullable();
            $table->string('exp_designation')->nullable();
            $table->text('joining_date_from')->nullable();
            $table->string('joining_date_to')->nullable();
            $table->string('technology')->nullable();
            $table->string('type')->nullable();
            $table->string('notice_period')->nullable();
            $table->integer('exp_ctc')->nullable();
            $table->integer('current_ctc')->nullable();
            $table->string('preferance_location')->nullable();
            $table->string('department')->nullable();
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
        Schema::dropIfExists('experiances');
    }
}
