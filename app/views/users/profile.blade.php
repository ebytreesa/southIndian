@extends('layouts.home')

@section('title')
profile
@stop

@section('content')
<div class="row " style="border:1px solid black; margin-bottom:30px;padding:25px;">

	<div class="col-md-3">
		{{-- <img src="{{ URL::to('/users/'.Auth::user()->image)}}" class="image-responsive" style="height:120px; width:120px"> --}}
	</div>
	<div class="col-md-9">
	<p>Username: {{ Auth::user()->username }}</p>
	<p>Email: {{ Auth::user()->email }}</p>	
	<p>Votes: {{ Auth::user()->votes }}</p>
	<a href="{{ URL::to('/profile/editUser/'.Auth::user()->id) }}" class="btn btn-default" style="margin-left:50px;">Edit</a>
	</div>
	{{-- <div class="col-md-6 ">
		
	</div> --}}
</div>

<div class="row">
	@if(Auth::user()->admin == 1)
	@else
	@endif
	
</div>



	


@stop