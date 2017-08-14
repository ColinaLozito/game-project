@extends('main')

@section('create')

<div class="container">
{!! Form::open(['route'=>'hero.store' , 'method' => 'POST', 'role'=>'form']) !!}
		<div class="form-group">
			{!! Form::Label('hero','HERO') !!}
			{!! Form::Text('name',null,['class'=>'form-control', 'placeholder'=>'Heroe Name', 'required']) !!}
		</div>
		<div>
			{!! Form::Label('class','CLASS') !!}
			{!! Form::select('class', [''=>'','warrior' => 'warrior', 'wizard' => 'wizard', 'rogue' => 'rogue'],null, array('class' => 'form-control')); !!}
		</div>
		<div>
			{!! Form::Label('health','health') !!}
			{!! Form::Text('health',null,['class'=>'form-control haroHealth', 'placeholder'=>'health', 'readonly']) !!}
		</div>
		<div>
			{!! Form::hidden('atack',null,['class'=>'haroAtack','readonly']) !!}
			{!! Form::hidden('speed',null,['class'=>'haroSpeed', 'readonly']) !!}
			{!! Form::hidden('luck',null,['class'=>'haroLuck', 'readonly']) !!}
		</div>
		
			{!! Form::submit('Add Hero', array('class' => 'contact')) !!}
		
    
	{!! Form::close() !!}
</div>

<script src="{{ asset('/js/hero.js') }}"></script>
@endsection()
