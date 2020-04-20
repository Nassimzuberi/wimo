<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sellers', function (Blueprint $table) {
            /* Ajout de le nom de la boutique comme attribut */
            $table->text('name_shop')->after('id')->nullable(true);
            /* Modifie le type de l'attribut: JSON -> TEXT */
            $table->text('address')->change();
            /* Unicité du numéro de téléophone */
            $table->unique('phone_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sellers', function (Blueprint $table) {
            //
        });
    }
}
