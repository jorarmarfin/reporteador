<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_1')->nullable();
            $table->string('c_2')->nullable();
            $table->string('c_3')->nullable();
            $table->string('c_4')->nullable();
            $table->string('c_5')->nullable();
            $table->string('c_6')->nullable();
            $table->string('c_7')->nullable();
            $table->string('c_8')->nullable();
            $table->string('c_9')->nullable();
            $table->string('c_10')->nullable();
            $table->string('c_11')->nullable();
            $table->string('c_12')->nullable();
            $table->string('c_13')->nullable();
            $table->string('c_14')->nullable();
            $table->string('c_15')->nullable();
            $table->string('c_16')->nullable();
            $table->string('c_17')->nullable();
            $table->string('c_18')->nullable();
            $table->string('c_19')->nullable();
            $table->string('c_20')->nullable();
            $table->string('c_21')->nullable();
            $table->string('c_22')->nullable();
            $table->string('c_23')->nullable();
            $table->string('c_24')->nullable();
            $table->string('c_25')->nullable();
            $table->string('c_26')->nullable();
            $table->string('c_27')->nullable();
            $table->string('c_28')->nullable();
            $table->string('c_29')->nullable();
            $table->string('c_30')->nullable();
            $table->string('c_31')->nullable();
            $table->string('c_32')->nullable();
            $table->string('c_33')->nullable();
            $table->string('c_34')->nullable();
            $table->string('c_35')->nullable();
            $table->string('c_36')->nullable();
            $table->string('c_37')->nullable();
            $table->string('c_38')->nullable();
            $table->string('c_39')->nullable();
            $table->string('c_40')->nullable();

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
        Schema::dropIfExists('data');
    }
}
