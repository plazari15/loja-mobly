<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('taxvat');
            $table->string('rg');
            $table->string('ddd_cel');
            $table->string('celphone');
            $table->string('telephone');
            $table->string('ddd_tel');
            $table->string('last_order')->nullable();
            $table->string('avarage')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
