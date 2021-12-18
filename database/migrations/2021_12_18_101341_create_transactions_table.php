<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id');
            $table->foreignId('outlet_id');
            $table->double('bill_total');
            $table->timestamps();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
