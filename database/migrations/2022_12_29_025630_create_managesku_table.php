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
        Schema::create('managesku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Part_No', 45)->unique();
            $table->string('SKU', 45);
            $table->string('Chainnest_Price', 45)->nullable();
            $table->enum('Availablity', ['Yes', 'No'])->nullable();
            $table->text('Description')->nullable();
            // $table->string('Created_by', 45)->nullable();
            //$table->foreignId('productype_id')->references('id')->on('productype')->onDelete('cascade');
            // $table->foreignId('companies_id')->references('id')->on('companies')->onDelete('cascade');
            // $table->foreignId('inventory_id')->references('id')->on('inventory')->onDelete('cascade');
            // $table->foreignId('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('currancy_id')->nullable()->references('id')->on('currancy')->onDelete('cascade');

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
        Schema::dropIfExists('_managesku');
    }
};
