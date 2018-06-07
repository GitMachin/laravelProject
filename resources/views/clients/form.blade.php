@extends('layouts.client')

@section('content')
	<form method="post" action="create">
		{{ csrf_field() }}
		<input type="text" name="nom" value="{{ old('nom') }}" />
		<input type="text" name="prenom" value="{{ old('prenom') }}"  />
		<input type="submit" />
	</form>

	@if ($errors->any())
		<pre>
			$errors->any() : indique si contient des erreurs.
			$errors->all() : retourne la liste des erreurs
			$errors->get('champ') : retourne l'erreur lié à un champ
		</pre>
	
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@endsection

@section('list')
	@foreach($clients as $client)
	<li>
		{{ $client->nom }}
	</li>
	@endforeach
@endsection

@section('footer')
	<p>
		bas page
	</p>
@endsection
