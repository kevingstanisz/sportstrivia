@extends('layouts.app')

@section('content')

  @php
  $betindex = 0;
  @endphp
  @foreach ($newgames as $newgame)
 
  @if ($newgame == $lastgame)
<h1 id = "settingsheader">{{$newprettygames[$betindex]}} Category Probabilities</h1>
  @endif
 
@php
  $betindex++;
@endphp
@endforeach

  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    @php
    $betindex = 0;
    @endphp
    @foreach ($newgames as $newgame)
        <li class="nav-item">
        @if ($newgame == $lastgame)
        <a class="nav-link active" id="{{'pills-' . $newgame . '-tab'}}" data-toggle="tab" href="{{'#pills-' . $newgame}}" role="tab" aria-controls="{{'pills-' . $newgame}}" aria-selected="true">{{$newprettygames[$betindex]}}</a>
        @else
        <a class="nav-link" id="{{'pills-' . $newgame . '-tab'}}" data-toggle="tab" href="{{'#pills-' . $newgame}}" role="tab" aria-controls="{{'pills-' . $newgame}}" aria-selected="false">{{$newprettygames[$betindex]}}</a>
        @endif
        </li>
      @php
        $betindex++;
    @endphp
    @endforeach
  </ul>

  {!! Form::open(['action' => ['SettingsController@update'], 'method' => 'POST', 'id' => 'myform']) !!} 
  <div class="tab-content" id="pills-tabContent">
    @php
        $betindex = 0;
    @endphp

    @foreach ($gamesprobs as $gameprob)

    @php
        $game = $newgames[$betindex];
    @endphp
    @if ($loop->first)
    <div class="tab-pane fade show active" id="{{'pills-' . $newgames[$betindex]}}" role="tabpanel" aria-labelledby="{{'pills-' . $newgames[$betindex] . '-tab'}}">
    @else
    <div class="tab-pane fade" id="{{'pills-' . $newgames[$betindex]}}" role="tabpanel" aria-labelledby="{{'pills-' . $newgames[$betindex] . '-tab'}}">
    @endif  

    
    @if(count($gameprob) > 0)
      <table class = "table table-striped">
      @foreach($gameprob as $gamepro)
        <tr>
        <td style="width: 20%">{{$loop->parent->index}}</td>
        <td style="width: 80%">
          <div class="range-slider">
            <input class="range-slider__range" type="range" name = "dollars_bet[]" value={{$gamepro->$game}} min="0" max="100">
            <span class="range-slider__value">0</span>
          </div>
        </td>
        </tr>
      @endforeach 
      </table>
    @endif

    {{-- {{Form::submit('Update', ['class' => 'btn btn-primary'])}} --}}
    
    </div>

    @php
        $betindex++;
    @endphp
    @endforeach
  </div>

  {!! Form::close() !!}

  <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script id = "rendered-js">
    
    var rangeSlider = function () {
      var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');

      slider.each(function () {

        value.each(function () {
          var value = $(this).prev().attr('value');
          $(this).html(value);
        });

        range.on('input', function () {
          $(this).next(value).html(this.value);
        });
      });
    };

    rangeSlider();
  </script>
@endsection
</div>
</div>  

<div style = "position: absolute; bottom: 0px;" class="container1">
    <section style = "width: 100%" class="color-1">
        <p style = "width: 100%">
            <a href='{{'/' . $backbutton[1]}}'><button class="btn btn-4 btn-4d icon-arrow-left">{{$backbutton[0]}}</button></a>
            <button type="submit" form="myform" id = "reloadButton" class="btn btn-1 btn-1d">Save Settings</button>
        <a href='/'><button class="btn btn-4 btn-4c icon-arrow-right">Home</button></a>
        </p>
    </section>
</div>