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
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('Email');
            // $table->string('Phone');
            $table->string('password')->nullable();
          //  $table->foreignId('permission_id')->constrained('permission')->onDelete('cascade');
            // $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('_admin');
    }
};
