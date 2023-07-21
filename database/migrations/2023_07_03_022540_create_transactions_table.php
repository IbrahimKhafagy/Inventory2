<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('delivery_QTY', 45)->nullable();
          $table->string('From_inv', 45)->nullable();
          $table->string('To_inv', 45)->nullable();
          $table->text('Description')->nullable();
          $table->string('Created_by', 45)->nullable();
          $table->foreignId('users_id')->constrained('users')->onDelete('cascade')->nullable();
          $table->foreignId('transactiontypes_id')->references('id')->on('transactiontypes')->onDelete('cascade')->default('1');
          $table->foreignId('products_id')->references('id')->on('products')->onDelete('cascade')->nullable();
          $table->unsignedBigInteger('inventory_id')->nullable();
          $table->foreign('inventory_id')->references('id')->on('inventory')->onDelete('cascade');
          $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
};
