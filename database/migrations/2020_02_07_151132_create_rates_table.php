<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comments')->nullable(true);
            $table->unsignedDecimal('rating',3,2)->nullable(true);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sale_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sale_id')->references('id')->on('sales');            
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
        Schema::dropIfExists('rates');
    }
}
