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
        Schema::create('attached', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->foreignId('inventory_id')->references('id')->on('inventory')->onDelete('cascade');
            $table->foreignId('products_id')->references('id')->on('products')->onDelete('cascade');

           // $table->foreignId('companies_id')->references('id')->on('companies')->onDelete('cascade');

            $table->string('Created_by', 45)->nullable();
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
        Schema::dropIfExists('attached');
    }
};
