<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('merchant_name');
            $table->timestamps();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
        });
    }

    public function down()
    {
        Schema::dropIfExists('merchants');
    }
}
