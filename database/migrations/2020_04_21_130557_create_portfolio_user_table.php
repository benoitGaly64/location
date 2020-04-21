<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_user', function (Blueprint $table) {
            $table->id();
            $table->integer('portfolio_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('portfolio_id')->references('id')->on('portfolios')
						->onDelete('restrict')
                        ->onUpdate('restrict');
            
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('portfolio_user');
    }
}
