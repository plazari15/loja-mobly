<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('qtd');
            $table->integer('minimium');
            $table->float('normal_price', 10, 2);
            $table->float('updated_price', 10, 2)->comment('Updated price when want to give discounts');
            $table->longText('big_description');
            $table->string('SKU');
            $table->string('height');
            $table->string('width');
            $table->string('length');
            $table->string('weight');
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
        Schema::dropIfExists('products');
    }
}
