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
        Schema::create('team', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('Name');
             $table->string('Position');
             $table->string('Email');
             $table->string('Phone');
             //$table->foreignId('permission_id')->references('id')->on('permission')->onDelete('cascade');
             $table->foreignId('companies_id')->references('id')->on('companies')->onDelete('cascade');
             $table->foreignId('companytype_id')->references('id')->on('companytype')->onDelete('cascade');
             $table->foreignId('users_id')->constrained('users')->onDelete('cascade');

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
        Schema::dropIfExists('team');
    }
};
