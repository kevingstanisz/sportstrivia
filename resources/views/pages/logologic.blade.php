<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='{{asset('css/logologic.css')}}'>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="{{asset('js/logologic.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('CreativeButtons/css/default.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('CreativeButtons/css/component.css')}}" />
    <script src="{{asset('CreativeButtons/js/modernizr.custom.js')}}"></script>
</head>
<body>
    <div class="sliced">
        <img src="{{asset($file_path)}}">
    </div>  
    <div id="teamname">
        {{$teamname}}
    </div> 
    <div style = "position: absolute; bottom: 0px;" class="container1">
        <section class="color-1">
            <p>
                <a href='/'><button class="btn btn-4 btn-4d icon-arrow-left">Main Menu</button></a>
                @if(session('randomizedGame') == true)
                    <button class="btn btn-1 btn-1d" onclick="location.href='/random';">Next Random</button>
                @else
                    <button type="button" id = "reloadButton" class="btn btn-1 btn-1d">Next Logo</button>
                @endif
                <a href='/settings'><button class="btn btn-4 btn-4c icon-arrow-right">Settings</button></a>
            </p>
        </section>
    </div>
</body>
</html>