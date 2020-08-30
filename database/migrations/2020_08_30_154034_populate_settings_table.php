<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PopulateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            $data = [
                ['category'=>'nba', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> 100],
                ['category'=>'nbatb', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> 100],
                ['category'=>'mlb', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> 100],
                ['category'=>'mlbtb', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> 100],
                ['category'=>'nfl', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> 100],
                ['category'=>'nfltb', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> 100],
                ['category'=>'nhl', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> 100],
                ['category'=>'power5', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> -1],
                ['category'=>'remfbs', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> -1],
                ['category'=>'fcs', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> -1],
                ['category'=>'mls', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> -1],
                ['category'=>'soccer', 'logologic'=> 100, 'spellbinders'=> 100, 'photofinish'=> 100],
                ['category'=>'tennis', 'logologic'=> -1, 'spellbinders'=> -1, 'photofinish'=> 100],
                ['category'=>'golf', 'logologic'=> -1, 'spellbinders'=> -1, 'photofinish'=> 100],
                ['category'=>'autoracing', 'logologic'=> -1, 'spellbinders'=> -1, 'photofinish'=> 100],
                ['category'=>'combat', 'logologic'=> -1, 'spellbinders'=> -1, 'photofinish'=> 100],
            ];

            DB::table('settings')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
