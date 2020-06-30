<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OwnersPossessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_possession', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id')->unsigned();
            $table->integer('possession_id')->unsigned();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('owners')
						->onDelete('restrict')
                        ->onUpdate('restrict');
            
            $table->foreign('possession_id')->references('id')->on('possessions')
						->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owner_possession');
    }
}
