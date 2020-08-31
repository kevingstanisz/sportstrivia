<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    public function index(){

        echo (session('lastGamebtn'));

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
        foreach (config('gameinfo.raw_name') as &$gamecategory) {
            $probabilities = Setting::select('category', $gamecategory)->where($gamecategory, '>=', 0)->get();
            array_push($gamesprobs, $probabilities);
        }


        $lastgame = 'logologic';
        //print_r($gamesprobs);

        // if($game == 'logologic' || $game == 'spellbinders'){
             $leaguenames = array('NBA', 'NBA Throwback', 'MLB', 'MLB Throwback', 'NFL', 'NFL Throwback', 'NHL', 'Power 5', 'Remaining FBS', 'FCS', 'MLS', 'Soccer');
        // }
        // else{
        //     $leaguenames = array('NBA', 'NBA Throwback', 'MLB', 'MLB Throwback', 'NFL', 'NFL Throwback', 'NHL', 'Soccer', 'Tennis', 'Golf', 'Auto Racing', 'Combat');
        // }

        foreach($probabilities as $key=>$rawleague){
            $rawleague->category = $leaguenames[$key];
        }
        
        $newgames = array();
        array_push($newgames, 'logologic');
        array_push($newgames, 'spellbinders');
        array_push($newgames, 'photofinish');

        $newprettygames = array();
        array_push($newprettygames, 'Logo Logic');
        array_push($newprettygames, 'Spell Binders');
        array_push($newprettygames, 'Photo Finish');


        return view('pages.newsettings')->with('league_probs', $probabilities)->with('gamesprobs', $gamesprobs)->with('newgames', $newgames)->with('newprettygames', $newprettygames)->with('lastgame', $lastgame)->with('backbutton', $backbutton)->with('lastGamebtn', session('lastGamebtn'));
    }

    public function update(Request $request){

        print_r(count($request->input("dollars_bet")));

        foreach ($request->input("dollars_bet") as $index=>$newbet){ 
            print_r($newbet);
            echo " ";
            print_r($index);
            echo " ";
        }

            $idtoupdate = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6, 7, 12, 13, 14, 15, 16);
            echo count($idtoupdate);

            foreach ($request->input("dollars_bet") as $index=>$newbet){ 
                if($index < 12){
                    $game = 'logologic';
                }
                else if($index < 24){
                    $game = 'spellbinders';
                }
                else{
                    $game = 'photofinish';
                }
                Setting::where('id',$idtoupdate[$index])->update(array($game=>$newbet));
            }

        return redirect('/settings')->with('success', 'Settings Updated');
    }
}
 