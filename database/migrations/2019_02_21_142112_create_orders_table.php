<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('taxvat');
            $table->unsignedInteger('client_id');
            $table->foreign( 'client_id')
                ->references('id')
                ->on('clients');
            $table->string('shipping_zip_code');
            $table->string('shipping_street');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_neighborhood');
            $table->string('shipping_number');
            $table->string('shipping_complement')->nullable();
            $table->string('invoice_zip_code');
            $table->string('invoice_street');
            $table->string('invoice_city');
            $table->string('invoice_state');
            $table->string('invoice_neighborhood');
            $table->string('invoice_number');
            $table->string('invoice_complement')->nullable();
            $table->string('status_id');
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
        Schema::dropIfExists('orders');
    }
}
