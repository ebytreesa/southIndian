@extends('layouts.home')

@section('title')
add to Galleri
@stop

@section('content')
<h3>Add Billeder</h3>

{{ Form::open(array('route' => 'postAddGalleri', 'files' => true,'multiple'=>true )) }}
	<div class="form-group">
		{{ Form::label('Select an image')}}
		{{ Form::file('images[]') }}<br>
		{{ Form::file('images[]') }}<br>
		{{-- {{ Form::file('image[]') }}<br>
		{{ Form::file('image[]') }}<br> --}}
		{{ Form::submit('upload', array('class'  => 'btn btn-primary')) }}		
	{{ Form::close()}}

	<div class="container" style="margin-top: 20px;">
<div class="row" style="height:100px;">
@foreach($galleri as $galleri)
	<div class="col-sm-2" style="margin-bottom:20px;">
		<img src="/galleri/{{ $galleri->image }}" class="img-responsive">
		<div class="button-group" style="margin-top:10px;text-align:center;">
		<a href="/admin/editGalleri/{{ $galleri->id }}" class="btn  btn-xs btn-warning" style="">Edit</a>
		<a href="/admin/deleteGalleri/{{ $galleri->id}} " class="btn btn-xs btn-danger pull-right" style="">Delete</a>
		</div>
	</div>
	
	@endforeach
</div>

</div>
@stop