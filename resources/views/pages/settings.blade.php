@extends('layouts.app')

@section('content')
  <h1>{{$games[0][0]}} Category Probabilities</h1>

  {!! Form::open(['action' => ['SettingsController@update', $game], 'method' => 'POST', 'id' => 'myform']) !!} 
    @if(count($league_probs) > 0)
      <table class = "table table-striped">
      @foreach($league_probs as $league_prob)
        <tr>
        <td style="width: 20%">{{$league_prob->category}}</td>
        <td style="width: 80%">
          <div class="range-slider">
            <input class="range-slider__range" type="range" name = "dollars_bet[]" value={{$league_prob->$game}} min="0" max="100">
            <span class="range-slider__value">0</span>
          </div>
        </td>
        </tr>
      @endforeach 
      </table>
    @endif

  {{-- {{Form::submit('Update', ['class' => 'btn btn-primary'])}} --}}
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
            <a href='/{{$games[0][1]}}'><button class="btn btn-4 btn-4d icon-arrow-left">{{$games[0][0]}}</button></a>
            <button type="submit" form="myform" id = "reloadButton" class="btn btn-1 btn-1d">Save Settings</button>
            <a href='/{{$games[1][1]}}'><button class="btn btn-4 btn-4c icon-arrow-right">{{$games[1][0]}}</button></a>
        </p>
    </section>
</div>
