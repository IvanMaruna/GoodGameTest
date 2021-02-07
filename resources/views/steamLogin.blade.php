<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('header')

        <div class="loginContainer">
		    @if(Auth::check())
		        <div class="avatar"><img src="{{Auth::user()->avatar}}"></div>
		        <div class="textContainer">
		        	<p class="username">{{ Auth::user()->username }}</p>
		        	<a href="logout" class="logout">Logout</a>
		        </div>		        
		    @else
		        <a href="auth/steam" class="steamLogin"><img src="{{ asset('images/sits_02.png') }}"></a>
		    @endif
		</div>

    </body>
</html>

