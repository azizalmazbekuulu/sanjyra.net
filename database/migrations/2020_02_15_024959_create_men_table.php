<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('men', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('father_id');
            $table->integer('level');
            $table->tinyInteger('kanchanchy_bala');
            $table->integer('mother_id')->nullable();
            $table->string('mother_name')->nullable();
            $table->tinyInteger('bala_sany')->nullable();
            $table->string('uruusu')->nullable();
            $table->mediumText('info')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('modified_by')->nullable();
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
        Schema::dropIfExists('men');
    }
}
