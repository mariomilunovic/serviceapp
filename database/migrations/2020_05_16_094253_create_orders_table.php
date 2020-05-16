<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('device_id');
            $table->unsignedBigInteger('status_id');
            $table->text('problem_description');
            $table->unsignedDecimal('time_spent')->nullable();        
            $table->text('public_comment')->nullable();
            $table->text('internal_comment')->nullable();
            $table->timestamp('payment_status')->nullable(); 
            $table->timestamps(); // created_at, updated_at

           $table->foreign('user_id')->references('id')->on('users'); //->onDelete('cascade');
           $table->foreign('client_id')->references('id')->on('clients'); //->onDelete('cascade');
           $table->foreign('device_id')->references('id')->on('devices'); //->onDelete('cascade');
           $table->foreign('status_id')->references('id')->on('statuses'); //->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
