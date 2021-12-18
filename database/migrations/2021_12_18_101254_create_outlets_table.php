<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutletsTable extends Migration
{
    public function up()
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id');
            $table->string('outlet_name');
            $table->timestamps();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
        });
    }

    public function down()
    {
        Schema::dropIfExists('outlets');
    }
}
