<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewAttributDropOldAttributSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->unsignedDecimal('price_unit',6,2)->change();
            $table->unsignedDecimal('price_weight',5,2)->change();
            $table->enum('price_mesure',['pièce','kilogramme','gramme']);
            $table->enum('quantity_mesure',['pièce','kilogramme','gramme']);
            $table->enum('stock',['disponible','bientôt disponible','épuisé','bientôt épuisé'])->nullable(true);
            $table->string('origine')->nullable(true);
            $table->renameColumn('price_unit','price');
            $table->renameColumn('price_weight','quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            //
        });
    }
}
