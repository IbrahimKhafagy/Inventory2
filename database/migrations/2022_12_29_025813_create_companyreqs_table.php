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
        Schema::create('companyreqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name',45);
            $table->string('Position',45)->nullable();
            $table->string('Phone',45);
            $table->string('Email',100);
            $table->string('Company_Name',100);
            $table->string('Co_Address',100)->nullable();
            $table->string('Co_Website')->nullable();
            $table->string('Business_Activity',100)->nullable();
            // $table->integer('status')->default(1);

            $table->foreignId('status_id')->references('id')->on('status')->onDelete('cascade');
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
        Schema::dropIfExists('companyreqs');
    }
};
