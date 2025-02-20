<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->integer('customerID');
            $table->integer('orderID');
            $table->string('name')->nullable();
            $table->text('fileP')->nullable();
            $table->integer('statusID')->default(1);
            $table->string('status')->default('Active');
            $table->integer('cuid')->nullable();
            $table->integer('uuid')->nullable();
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
        Schema::dropIfExists('images');
    }
}
