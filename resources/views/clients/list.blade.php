@extends('layouts.client')

@section('content') 
<div> <img src='/mon_image.jpg' /></div>
		Si on veux integrer du html sans proteger le champs :<br />
		{!! $html !!} 
		sinon <br />
		{{  $html  }} 
@endsection
 

@section('footer') 
<p> 
		   Hello <b>{{ $nom }} {{ $prenom }}</b> <i>({{ $id }})</i>
		</p>  
@endsection
