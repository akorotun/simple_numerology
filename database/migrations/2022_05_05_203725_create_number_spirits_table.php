<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumberSpiritsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_spirits', function (Blueprint $table) {
            $table->id();
            $table->integer('number');//число душі
            $table->text('general');//загальна інформація
            $table->string('spirit_image')->nullable();//картинка для планети
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
        Schema::dropIfExists('number_spirits');
    }
}
