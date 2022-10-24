<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDonatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_donates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company');
            $table->string('email');
            $table->string('phone_number');
            $table->enum('gender', ['man', 'woman', 'other'])->default('man');
            $table->enum('payment_mode', ['visa', 'mastercard', 'amex'])->default('visa');
            $table->string('card_number');
            $table->string('expiration');
            $table->string('cvn');
            $table->integer('donate_us');
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
        Schema::dropIfExists('customer_donates');
    }
}
