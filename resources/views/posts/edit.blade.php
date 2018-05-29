@extends('layouts.app')

@section('content') 
	<div class="container">
		 {!! form_start( $form ) !!}
		<div class="row">
			<div class="col-sm-6">
				{!! form_row( $form->name ) !!}
			</div>
			<div class="col-sm-6">
				{!! form_row( $form->description ) !!}
			</div>
		</div>
		 {!! form_rest( $form ) !!}
			 
		 {!! form_end( $form ) !!}
	</div>
@endsection