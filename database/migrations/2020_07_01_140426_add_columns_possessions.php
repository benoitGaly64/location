<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsPossessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('possessions', function (Blueprint $table) {
            $table->text('type')->nullable();
            $table->text('living_space')->nullable();
            $table->text('land_area')->nullable();
            $table->text('type_of_heating')->nullable();
            $table->text('sanitation')->nullable();
            $table->text('glazing')->nullable();
            $table->text('structure')->nullable();
            $table->text('frame')->nullable();
            $table->text('roof_cover')->nullable();
            $table->text('connections')->nullable();
            $table->text('numbre_of_rooms')->nullable();
            $table->text('dependencies')->nullable();
            $table->text('date_electrical_circuit')->nullable();
            $table->text('date_water_circuit')->nullable();
            $table->text('date_purchase')->nullable();
            $table->text('buying_price')->nullable();
            $table->text('old_owner')->nullable();
            $table->text('notary')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('possessions', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('living_space');
            $table->dropColumn('land_area');
            $table->dropColumn('type_of_heating');
            $table->dropColumn('sanitation');
            $table->dropColumn('glazing');
            $table->dropColumn('structure');
            $table->dropColumn('frame');
            $table->dropColumn('roof_cover');
            $table->dropColumn('connections');
            $table->dropColumn('numbre_of_rooms');
            $table->dropColumn('dependencies');
            $table->dropColumn('date_electrical_circuit');
            $table->dropColumn('date_water_circuit');
            $table->dropColumn('date_purchase');
            $table->dropColumn('buying_price');
            $table->dropColumn('old_owner');
            $table->dropColumn('notary');
        });
    }
}
