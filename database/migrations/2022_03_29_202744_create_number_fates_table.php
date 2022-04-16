<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumberFatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_fates', function (Blueprint $table) {
            $table->id();
            $table->integer('number');//число долі
            $table->text('general');//загальна інформація
            $table->text('positive');//позитивні якості
            $table->text('negative');//негативні якості
            $table->text('professions');//відповідні професії
            $table->text('compatibility');//сумісність
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
        Schema::dropIfExists('number_fates');
    }
}
