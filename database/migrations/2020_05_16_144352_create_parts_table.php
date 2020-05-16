<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();      
            $table->unsignedBigInteger('part_category_id');    
            $table->unsignedBigInteger('order_id')->nullable(); 
            $table->string('brand');
            $table->string('model');
            $table->string('serial');
            $table->string('supplier');
            $table->unsignedDecimal('price');
            $table->string('supplier_invoice_number');
            $table->timestamps();

           // $table->foreign('part_category_id')->references('id')->on('part_categories'); //->onDelete('cascade');
            //$table->foreign('order_id')->references('id')->on('orders'); //->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
}
