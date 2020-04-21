<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePossessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('possessions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('address');
            $table->integer('zipCode');
            $table->string('town');
            $table->integer('portfolio_id')->unsigned();
            $table->timestamps();

            $table->foreign('portfolio_id')->references('id')->on('portfolios')
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
        Schema::dropIfExists('possessions');
    }
}
