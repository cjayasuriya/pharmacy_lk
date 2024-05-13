<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customerID');
            $table->text('address')->nullable();
            $table->timestamp('deliveryDate')->nullable();
            $table->string('timeSlot')->nullable();
            $table->integer('statusID')->default(1);
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('orders');
    }
}
