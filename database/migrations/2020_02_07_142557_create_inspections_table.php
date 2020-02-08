<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('observation');
            $table->unsignedDecimal('rating',3,2);
            $table->unsignedBigInteger('inspector_id');
            $table->unsignedBigInteger('sale_id');
            $table->foreign('inspector_id')->references('id')->on('inspectors');
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
        Schema::dropIfExists('inspections');
    }
}
