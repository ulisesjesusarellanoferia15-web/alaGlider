<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('flight_id')->nullable();
            $table->uuid('package_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->string('provider'); // stripe | mercadopago | paypal
            $table->string('provider_payment_id')->nullable(); // session id / preference id / payment id
            $table->decimal('amount', 10, 2)->default(0);
            $table->string('currency', 10)->default('MXN');
            $table->string('status')->default('pending'); // pending, paid, failed
            $table->json('meta')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
