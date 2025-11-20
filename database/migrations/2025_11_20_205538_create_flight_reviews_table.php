<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('flight_id');
            $table->uuid('user_id');
            $table->tinyInteger('rating'); // (1 - 5)
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_reviews');
    }
}
