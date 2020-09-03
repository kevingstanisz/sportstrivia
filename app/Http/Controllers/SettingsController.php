<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    public function index(){
        if(session('randomizedGame')){
            $backbutton = array('Random', 'random');
        }
        else if(session('lastGamebtn') == 'home'){
            $backbutton = array('Home', '');
        }
        else{
            $backbutton = array(config('gameinfo.pretty_name')[array_search(session('lastGamebtn'), config('gameinfo.raw_name'), true)], session('lastGamebtn'));
        }

        $gamesprobs = array();
        $lastgame = config('gameinfo.raw_name')[0];
        foreach (config('gameinfo.raw_name') as $gamecategory) {
            if($gamecategory == $backbutton[1]){
                $lastgame = $gamecategory;
            }

            $probabilities = Setting::select('category', $gamecategory)->where($gamecategory, '>=', 0)->get();
            array_push($gamesprobs, $probabilities);
        }

        $prettycategories = config('categories');
        
        $newgames = config('gameinfo.raw_name');
        $newprettygames = config('gameinfo.pretty_name');

        return view('pages.newsettings')->with('league_probs', $probabilities)->with('gamesprobs', $gamesprobs)->with('newgames', $newgames)->with('newprettygames', $newprettygames)->with('prettycategories', $prettycategories)->with('lastgame', $lastgame)->with('backbutton', $backbutton)->with('lastGamebtn', session('lastGamebtn'));
    }

    public function update(Request $request){
        $idtoupdate = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6, 7, 12, 13, 14, 15, 16);

        foreach ($request->input("categoryprob") as $index=>$newprob){ 
            $game = config('gameinfo.raw_name')[$index / 12];

            Setting::where('id',$idtoupdate[$index])->update(array($game=>$newprob));
        }

        return redirect('/settings')->with('success', 'Settings Updated');
    }
}
 