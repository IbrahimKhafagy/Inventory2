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
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
          // $table->foreignId('companies_id')->references('id')->on('companies')->onDelete('cascade');
          //  $table->foreignId('inventory_id')->references('id')->on('inventory')->onDelete('cascade');


            $table->timestamps();
        });
    }




    // public function up()
    // {
    //     Schema::create('notifications', function (Blueprint $table) {
    //         $table->uuid('id')->primary();
    //         $table->string('type');
    //         $table->morphs('notifiable');
    //         $table->text('data');
    //         $table->timestamp('read_at')->nullable();
    //       // $table->foreignId('companies_id')->references('id')->on('companies')->onDelete('cascade');
    //       //  $table->foreignId('inventory_id')->references('id')->on('inventory')->onDelete('cascade');


    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
