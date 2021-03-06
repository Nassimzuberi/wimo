<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img')->default("sales-default.png");
            $table->text('description')->nullable(true);
            $table->unsignedDecimal('price_unit',6,2)->change();
            $table->unsignedDecimal('price_weight',5,2)->change();
            $table->enum('price_mesure',['pièce','kilogramme','gramme']);
            $table->enum('quantity_mesure',['pièce','kilogramme','gramme']);
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('sales');
    }
}
