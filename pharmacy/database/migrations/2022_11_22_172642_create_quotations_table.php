<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->integer('orderID');
            $table->integer('customerID');
            $table->timestamp('quotedDate')->nullable();
            $table->timestamp('validTill')->nullable();
            $table->text('products')->nullable();
            $table->string('currency')->default('LKR');
            $table->double('subTotal')->default(0);
            $table->string('discount')->nullable();
            $table->double('delivery')->default(0);
            $table->double('grandTotal')->default(0);
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
        Schema::dropIfExists('quotations');
    }
}
