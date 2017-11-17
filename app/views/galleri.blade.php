@extends('layouts.home')

@section('title')
galleri
@stop

@section('content')
<h3>Galleri</h3>
<div class="container">
<div class="row" style="height:100px;">
@foreach($galleri as $galleri)
	<div class="col-sm-4">
		<img src="/galleri/{{ $galleri->image }}" class="img-responsive">
	</div>
	
	@endforeach
</div>

</div>
	

@stop