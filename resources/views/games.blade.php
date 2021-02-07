<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('header')
        <div class="pageTitle">
        	<h1>Game list: {{count($data)}} games found</h1>
        </div>

		<table class="gamesTable">
			<thead>
				<tr>
					<th>THUMBNAIL</th>
					<th>TITLE</th>
					<th>RELEASE DATE</th>
					<th>PRICE</th>
					<th>DISCOUNT</th>
				</tr>
			</thead>
		@foreach($data as $item)
			@foreach($item as $game)
				<tr> 
					<td><img src="{{$game['image']}}"></td>
					<td>{{$game['title']}}</td>
					<td>{{$game['date']}}</td>
					@foreach(explode('kr', $game['price']) as $price)
						@if($loop->iteration < 3)
					    <td>{{$price}}</td>
						@endif
					@endforeach		
				</tr>
			@endforeach
		@endforeach
		</table>

    </body>
</html>

