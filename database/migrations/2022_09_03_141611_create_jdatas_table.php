<?php
//{"Barri":{},"Titulats":{},"Aturats":{},"Renda_familiar":{},">_65_anys":{},"Index_sobreenvelliment":{}}

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
    public function up()
    {
        Schema::create('jdatas', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->default(0)->constrained()->onDelete('cascade');
            $table->string('barri')->unique()->nullable();
            $table->float('titulats')->default(0)->nullable();
            $table->float('aturats')->default(0)->nullable();
            $table->integer('renda_familiar')->default(0)->nullable();
            $table->float('over_65')->default(0)->nullable();
            $table->float('index_sobreenvelliment')->default(0)->nullable();
           
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
        Schema::dropIfExists('jdata');
    }
};
