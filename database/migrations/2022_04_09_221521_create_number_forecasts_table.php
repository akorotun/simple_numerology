<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumberForecastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_forecasts', function (Blueprint $table) {
            $table->id();
            $table->integer('number');//число року
            $table->text('general');//загальна інформація
            $table->text('health');//здоров'я
            $table->text('personal_life');//особисте життя
            $table->text('finance');//фінанси та кар'єра
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
        Schema::dropIfExists('number_forecasts');
    }
}
