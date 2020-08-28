@extends('layouts.app')

@section('content')
<script src="{{ asset('js/spellbinders.js') }}"></script>
<script>
    var randomTiles = @json($randomtiles);
</script>

    @php
        $tileindex = 0;
    @endphp

<div id="board">
    @foreach($tiles as $tile)
        @if($tileindex == 0 || $tileindex == 12 || $tileindex == 22 || $tileindex == 32)
            <span class="word">
        @endif
            <span id = "{{'box' . $tileindex }}">{{$tile}}</span>
        @if($tileindex == 11 || $tileindex == 21 || $tileindex == 31 || $tileindex == 43)
            </span>
        @endif
        
        @php
            $tileindex++;
        @endphp
    @endforeach 
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
                <button type="button" id = "reloadButton" class="btn btn-1 btn-1d">Next Team</button>
            @endif
            <a href='/settings'><button class="btn btn-4 btn-4c icon-arrow-right">Settings</button></a>
        </p>
    </section>
</div>