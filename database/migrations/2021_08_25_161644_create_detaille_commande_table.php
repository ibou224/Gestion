<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailleCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detaille_commande', function (Blueprint $table) {
            $table->id();
            $table->string('id_clt')->nullable();
            $table->text('commande');
            $table->string('price_d')->nullable();
            $table->string('qty_d')->nullable();
            $table->string('total_d')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('detaille_commande');
    }
}
