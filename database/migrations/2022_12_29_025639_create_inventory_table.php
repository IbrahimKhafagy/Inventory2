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
        Schema::create('inventory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inv_name', 45);
            $table->string('address', 100);
            $table->string('manager', 45);
            $table->string('Phone',45);
            $table->string('Email',100);
            $table->string('QTY', 45)->nullable();
            $table->enum('Inventory_Type', ['Main', 'Sub']);
            $table->boolean('create_prodcuts')->default(1);

            $table->foreignId('companies_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
           // $table->foreignId('categories_id')->references('id')->on('categories')->onDelete('cascade');
          //  $table->foreignId('subcategories_id')->references('id')->on('subcategories')->onDelete('cascade');

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
        Schema::dropIfExists('inventory');
    }
};
