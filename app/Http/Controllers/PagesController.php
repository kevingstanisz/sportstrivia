<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class PagesController extends Controller
{
    public function index(){
        $randomgame = config('gameinfo.url_name')[rand (0, count(config('gameinfo.url_name')) - 1)];
        session(['randomizedGame'=>false]);
        session(['lastGamebtn'=>'home']);
        return view('pages.index')->with('randomgame', $randomgame);
    }

    public function random(){ 
        $randomgame = config('gameinfo.url_name')[rand (0, count(config('gameinfo.url_name')) - 1)];
        session(['randomizedGame'=>true]);
        return redirect($randomgame);
    }

    private function CalcualateCategory($probabilities, $game)
    {
        $totalprobability = 0;

        for($categorycounter = 0; $categorycounter < sizeof($probabilities); $categorycounter++){
            $totalprobability += $probabilities[$categorycounter][$game];
        }

        $weightedcategory = rand(0, $totalprobability);

        $totalprobability = 0;
        $category = -1;

        for($categorycounter = 0; $categorycounter < sizeof($probabilities); $categorycounter++){
            if($weightedcategory < $totalprobability){
                $category = $categorycounter - 1;
                break; 
            }

            $totalprobability += $probabilities[$categorycounter][$game];
        }

        if($category == -1){
            $category = sizeof($probabilities) - 1;
        }

        return $category;
    }

    public function logologic(){
        $probabilities = Setting::select('category', 'logologic')->where('logologic', '>=', 0)->get();
        $category  = PagesController::CalcualateCategory($probabilities, 'logologic');
        $dir = 'logos/' . $probabilities[$category]['category'];
        $files = glob($dir . '/*.*');
        $file = array_rand($files);
        $file_path = $files[$file];

        $directoryname = dirname($file_path);

        $teamname = pathinfo($file_path);
        $readfilename = rawurlencode($teamname['basename']);
        $teamname = $teamname['filename'];
        $file_path = $directoryname . '/' . $readfilename;

        session(['lastGamebtn'=>'logologic']);

        return view('pages.logologic')->with('file_path', $file_path)->with('teamname', $teamname);
    }

    public function spellbinders(){
        $probabilities = Setting::select('category', 'spellbinders')->where('spellbinders', '>=', 0)->get();
        $category  = PagesController::CalcualateCategory($probabilities, 'spellbinders');

        $totalteams = 0;

        if (($handle = fopen("names/TeamNames.csv", "r")) !== FALSE) {
            $data = array();
            while($row = fgetcsv($handle)) {
                $data[] = $row[$category];
            }
            fclose($handle);
        }

        for($teamcounter = 0; $teamcounter < count($data); $teamcounter++)
        {
            if($data[$teamcounter] == ""){
                break;
            }

            $totalteams++;
        }

        $team = rand(1, $totalteams - 1);

        $wordsinteam = str_word_count($data[$team], 1 ,'0123456789&'); 

        $maxrow = array(10, 10, 12, 12);
        $rownumber = array(2, 3, 1, 4);
        $numberinrow = array(0, 0, 0, 0);
        $wordsinrow = array();
        $currentrow = 0;

        for($wordcounter = 0; $wordcounter < count($wordsinteam); $wordcounter++){
            if(isset($maxrow[$currentrow])){
                if($numberinrow[$currentrow] + strlen($wordsinteam[$wordcounter]) <= $maxrow[$currentrow]){
                    array_push($wordsinrow, $currentrow);
                    $numberinrow[$currentrow] += strlen($wordsinteam[$wordcounter]) + 1;
                }
                else{
                    if(($currentrow == 1) && ($maxrow[0] == 10)){
                        $wordcounter = -1;
                        $currentrow = 0;
                        $maxrow = array(12, 10, 10, 12);
                        $rownumber = array(1, 2, 3, 4);
                        $numberinrow = array(0, 0, 0, 0);
                        $wordsinrow = array();
                    }
                    else{
                        $currentrow++;
                        $wordcounter--;
                    }
                }
            }
            else{
                return redirect('/')->with('error', $data[$team] . 'cannot be displayed.');
            }
        }

        $tilearray = array();
        $currentrow  = 0;
        $starttiles = 0;

        for($rowcounter = 0; $rowcounter < 4; $rowcounter++){
            $currentrow = array_search($rowcounter + 1, $rownumber);

            if($numberinrow[$currentrow] == 0){
                for($tilecounter = 0; $tilecounter < $maxrow[$currentrow]; $tilecounter++){
                    array_push($tilearray, 0);
                }
            }
            else{
                $centertiles = ($maxrow[$currentrow] - $numberinrow[$currentrow]) / 2;

                $starttiles = 0;

                for($tilecounter = 0; $tilecounter < $centertiles; $tilecounter++){
                    $starttiles++;
                    array_push($tilearray, 0);
                }

                for($wordcounter = 0; $wordcounter < count($wordsinrow); $wordcounter++){
                    if($wordsinrow[$wordcounter] == $currentrow){
                        $arr1 = str_split($wordsinteam[$wordcounter]);
                        $tilearray = array_merge($tilearray, $arr1);
                        array_push($tilearray, 0);
                    }
                } 
                
                $tilesinrow = $numberinrow[$currentrow] + $starttiles;
                while($tilesinrow > $maxrow[$currentrow]){
                    array_pop($tilearray);
                    $tilesinrow--;
                }

                for($tilesinrow; $tilesinrow < $maxrow[$currentrow]; $tilesinrow++){
                    array_push($tilearray, 0);
                }
            }
        }

        $randomtiles = array();

        for($tilecounter = 0; $tilecounter < array_sum($maxrow); $tilecounter++){
            if(!is_numeric($tilearray[$tilecounter]) || $tilearray[$tilecounter] > 0){
                
                array_push($randomtiles, $tilecounter);
            }
        }

        shuffle($randomtiles);

        session(['lastGamebtn'=>'spellbinders']);
        
        return view('pages.spellbinders')->with('randomtiles', $randomtiles)->with('tiles', $tilearray);
    }

    public function photofinish(){
        $probabilities = Setting::select('category', 'photofinish')->where('photofinish', '>=', 0)->get();
        $category  = PagesController::CalcualateCategory($probabilities, 'photofinish');

        $dir = 'playerpics/' . $probabilities[$category]['category'] . '/';
        $dirs = array_filter(glob($dir . '*'), 'is_dir');
        $randomdir =  array_rand($dirs);
        $playername = substr($dirs[$randomdir], strrpos($dirs[$randomdir], '/' )+1);
        $files = glob($dirs[$randomdir] . '/*.*');
        $file = array_rand($files);
        $file_path = $files[$file];

        session(['lastGamebtn'=>'photofinish']);
        
        return view('pages.photofinish')->with('file_path', $file_path)->with('playername', $playername);
    }
}

