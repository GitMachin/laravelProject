@extends('layouts.client')

@section('content') 
	   <a href="/clients/create">Creer clients</a>
	<div> <img src='/mon_image.jpg' /></div> 
@endsection
  
@section('list') 
	@foreach($clients as $client)
		<li>
			{{ $client->nom }} 
			<form action="/clients/{{ $client->id }}" method="post">
				{{ csrf_field() }} 
				{{ method_field('DELETE') }}
				
				<button type="submit">Supprimer</button>
				<!--<input type="submit" value="Supprimer"/>-->
			</form>
		</li>
	@endforeach
@endsection

@section('footer') 
	<p> 
	   Hello footer
	</p>  
@endsection
