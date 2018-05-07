@extends('layouts.home')

@section('title')
	{{$city}}
@stop

@section('content')
<div class="container">
	<div class="row" style="position:relative;">
		<div class="col-sm-8">
			
				@foreach($kitchens as $kitchen)	
				<div class="row" style="border:1px solid red ; margin-bottom:30px;padding:25px; margin-top:20px;">
					<div class="col-sm-3">		
			
						@if($kitchen->image)
							<img src="{{ URL::to('/kitchens/'.$kitchen->image)}}" class="image-responsive" style="height:120px; width:120px">
						@else
							<img src="" class="image-responsive" style="height:120px; width:120px">
						@endif
					</div>
					<div class="col-sm-9">
							<p><a href="{{ URL::to('/'.$city.'/'.$kitchen->username.'/menu')}}">{{ $kitchen->username }}</a></p>
							
							<p>Email: {{ $kitchen->email }}</p>
							
							<p>Votes: {{ $kitchen->votes }}</p>
					</div>	
					</div>		
				@endforeach
			
			
		</div>

		<div class="col-sm-4" style="border:1px solid black;min-height:100px;margin-top:20px;position:absolute;right:0;">
			<div class="right-box" style="padding:10px;">	
				hjhgjhgj
			</div>
		</div>
	</div>		
		
</div>
@stop