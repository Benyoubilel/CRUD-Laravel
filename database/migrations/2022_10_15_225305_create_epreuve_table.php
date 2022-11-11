<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $primaryKey ='code_ep';
    public function up()
    {   
        Schema::disableForeignKeyConstraints();
        Schema::create('epreuves', function (Blueprint $table) {
            $table->id();
            $table->date("date_ep");
            $table->string("lieu_ep");
            $table->unsignedBigInteger('matiere_id');
            $table->foreign('matiere_id')
            ->references('id')
            ->on('matieres')
            ->onDelete('restrict')
            ->onUpdate('restrict');
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
        Schema::dropIfExists('epreuves');
    }
};
