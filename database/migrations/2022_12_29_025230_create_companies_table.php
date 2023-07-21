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
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Company_name',100)->unique();
            $table->string('Company_code',100)->unique();
            $table->string('Person_Name',45);
            $table->string('Email',45)->unique();
            $table->string('Position',45)->nullable();
            $table->string('Phone',45);
            $table->text('Company_Logo')->nullable();
            $table->string('Company_website',100)->nullable();
            $table->string('Company_Address',100);
            $table->string('Business_Activity',100)->nullable();
            //$table->string('Created_by', 45);
                        $table->foreignId('companytype_id')->references('id')->on('companytype')->onDelete('cascade');


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
        Schema::dropIfExists('companies');
    }
};
