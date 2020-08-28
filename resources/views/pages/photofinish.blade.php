@extends('layouts.app')

@section('content')
<script src="{{ asset('js/photofinish.js') }}"></script>
<link href="{{ asset('css/photofinish.css') }}" rel="stylesheet">


{{-- <div class="blur">
    <img src="https://4.bp.blogspot.com/_EZ16vWYvHHg/TFBW_zN6oaI/AAAAAAAAQd4/8UxrcXLQ5js/s1600/www.idool.net-Perrito.jpg">
    <button onclick="coverImage()" class="btnbl">Blur Image</button>
</div> --}}

<div id="board">
<img id="kitten" src="{{asset($file_path)}}" />
<canvas id="canvas"></canvas>
</div>
<div id="playername">
    {{$playername}}
</div> 

@endsection
</div>
</div>   

<div style = "position: absolute; bottom: 0px;" class="container1">
    <section style = "width: 100%" class="color-1">
        <p style = "width: 100%">
            <a href='/'><button class="btn btn-4 btn-4d icon-arrow-left">Main Menu</button></a>
            @if(session('randomizedGame') == true)
                <button class="btn btn-1 btn-1d" onclick="location.href='/random';">Next Random</button>
            @else
                <button type="button" onclick="location.href='/photofinish'" class="btn btn-1 btn-1d">Next Photo</button>
            @endif
            <a href='/settings'><button class="btn btn-4 btn-4c icon-arrow-right">Settings</button></a>
        </p>
    </section>
</div>