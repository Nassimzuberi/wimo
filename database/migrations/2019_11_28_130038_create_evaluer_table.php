<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluer', function (Blueprint $table) {
            $table->bigIncrements('id_evaluation');
            $table->text('commentaire')->nullable(true);
            $table->unsignedDecimal('note',3,2)->nullable(true);
            $table->unsignedBigInteger('utilisateur');
            $table->unsignedBigInteger('vente');
            $table->foreign('utilisateur')->references('id_utilisateur')->on('utilisateur');
            $table->foreign('vente')->references('id_vente')->on('vend');
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
        Schema::dropIfExists('evaluer');
    }
}
