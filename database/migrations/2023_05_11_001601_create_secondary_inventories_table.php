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
        Schema::create('secondary_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Product_name', 45);
            $table->string('Part_No', 45)->nullable();
            $table->string('Vendor', 45)->nullable();
            $table->string('Supplier', 100)->nullable();
            $table->string('BIN', 45)->nullable();
            $table->string('QTY', 45)->nullable();
            $table->string('Reorder_QTY', 45)->nullable();
            $table->string('Consumption_Rate', 45)->nullable();
            $table->enum('per', ['Day', 'Week', 'Month', 'Year']);
            $table->string('Price', 45)->nullable();
            $table->decimal('TotalPrice', 45)->nullable();
            //////////////////////////////////////////////////////////////////////////
            $table->date('changeQTY_at', 150)->nullable();
//////////////////////////////////////////////////////////////////////////////////////////
            // $table->string('SKU', 45)->nullable();
            $table->string('Location', 100)->nullable();
            $table->string('Cost', 45)->nullable();
            $table->date('Reorder_Date', 150)->nullable();
            $table->date('Expected_Date', 150)->nullable();
            $table->string('product_code')->nullable();
            $table->string('delivery_time', 150)->nullable();
            $table->enum('per1', ['Day', 'Week', 'Month']);
            $table->string('Other_Features', 150)->nullable();
            $table->string('Product_Manager', 45)->nullable();
            //$table->string('Stock_QTY', 45)->nullable();
            $table->string('Chain_Price', 45)->nullable();
            $table->decimal('TotalCost', 45)->nullable();
            $table->string('Description', 150)->nullable();
            $table->enum('Availbility', ['Yes', 'No'])->nullable();
            $table->text("cover")->nullable();// for cover image of attached
            $table->foreignId('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('subcategories_id')->references('id')->on('subcategories')->onDelete('cascade');
            //  $table->foreignId('permission_id')->references('id')->on('permission')->onDelete('cascade');
            $table->foreignId('productype_id')->references('id')->on('productype')->onDelete('cascade');
            $table->foreignId('managesku_id')->nullable()->references('id')->on('managesku')->onDelete('cascade');
            $table->foreignId('unit_id')->references('id')->on('unit')->onDelete('cascade');
           // $table->foreignId('attached_id')->references('id')->on('attached')->onDelete('cascade');
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('companies_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreignId('currancy_id')->references('id')->on('currancy')->onDelete('cascade');

         // $table->foreignId('managesku_id')->references('id')->on('managesku')->onDelete('cascade');
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
        Schema::dropIfExists('secondary_inventories');
    }
};
