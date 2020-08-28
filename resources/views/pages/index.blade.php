<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Creative Button Styles </title>
		<meta name="description" content="Creative Button Styles  - Modern and subtle styles &amp; effects for buttons" />
		<meta name="keywords" content="button styles, css3, modern, flat button, subtle, effects, hover, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{asset('CreativeButtons/css/default.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('CreativeButtons/css/component.css')}}" />
        {{-- <script src="{{asset('CreativeButtons/js/modernizr.custom.js')}}"></script> --}}
	</head>
	<body style = "background:#13294b">
		<div id="app">
			<br>
			<div class='container'>
				@include('inc.messages')
				<section>
					<p><button class="btn btn-4 btn-4c icon-arrow-right centerbutton" onclick="location.href='/logologic';">Logo Logic</button></p>
					<p><button class="btn btn-4 btn-4c icon-arrow-right centerbutton" onclick="location.href='/spellbinders';">Spell Binders</button></p>
					<p><button class="btn btn-4 btn-4c icon-arrow-right centerbutton" onclick="location.href='/photofinish';">Photo Finish</button></p>
					<p><button class="btn btn-4 btn-4c icon-arrow-right centerbutton" onclick="location.href='/random';">Random</button></p>
					<p><button class="btn btn-4 btn-4c icon-arrow-right centerbutton" onclick="location.href='/settings';">Settings</button></p>
				</section>
			</div>
		</div>
	</body>
</html>