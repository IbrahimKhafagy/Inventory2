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
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Category',45);
            $table->text('Description')->nullable();
            $table->string('Created_by', 45)->nullable();
			$table->softDeletes();
            $table->timestamps();
            $table->foreignId('companies_id')->references('id')->on('companies')->onDelete('cascade');
            // $table->unique([ 'companies_id','id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
