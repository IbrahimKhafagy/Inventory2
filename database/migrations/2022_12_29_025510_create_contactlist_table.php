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
    Schema::create('contactlist', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->foreignId('companies_id')->references('id')->on('companies')->onDelete('cascade');

        $table->enum('contact_type', ['Supplier', 'Buyer', 'Outsource', 'Others']);
        $table->string('Person_Name', 45)->nullable();
        $table->string('Company_Name', 100);
        $table->string('Position', 45)->nullable();
        $table->string('Phone', 25)->nullable();
        $table->string('Email', 45)->nullable();
        $table->string('Address', 100)->nullable();
        $table->string('product', 45)->nullable();
        $table->string('product_type', 45)->nullable();
        $table->string('Created_by', 45)->nullable();
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
        Schema::dropIfExists('contactlist');
    }
};
