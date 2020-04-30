<?php 
	$categories = [
		'Fruits' => ['Fruit','icons','fas fa-apple-alt'],

		'Légumes' => ['Légume','icons','fas fa-carrot'],

		'Épices' => ['Épice','icons','fas fa-pepper-hot'],

		'Plantes aromatiques' => ['Plante_aromatique','icons','fas fa-leaf'],

		'Céréales' => ['Céréale','image','wheat.svg'],

		'Champignons' => [ 'Champignon','image','mushroom.svg'],
	];
?>
@foreach( $categories as $category => $parameters) 
	<a class="nav-link @if($parameters[0]=='Fruit') active @endif" id="v-pills-{{$parameters[0]}}-tab" data-toggle="pill" href="#v-pills-{{$parameters[0]}}" role="tab" aria-controls="v-pills-{{$parameters[0]}}" aria-selected="true" onclick="init_filter('{{$parameters[0]}}')">
		@if($parameters[1]=='icons')
			<i class="{{$parameters[2]}}"></i>
		@else
			<img src="{{asset('images/products/'.$parameters[2])}}" alt="{{$parameters[2]}}">
		@endif
		{{$category}}
	</a>
@endforeach