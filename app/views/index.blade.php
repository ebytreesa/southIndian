@extends('layouts.home')

@section('title')
	South Indian 
@stop

@section('content')
	<div class="">
		<div id="myCarousel" class="carousel slide" data-ride="carousel" style="z-index:-1;">
		  <!-- Indicators -->
		  {{-- <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol> --}}

		  <!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <?php
						$slides = Slide::OrderBy('id','asc')->take(3)->get();
					?>
					@foreach ($slides as $key => $slide)
				    <div class="item {{ $key == 0 ? ' active' : '' }}">
				      <img src="{{ URL::to('/slides/'.$slide->image) }}" class="image-responsive" style="height:500px;width:100%;">
				    </div>
				    @endforeach

		    </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left"></span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right"></span>
			  </a>
			
		</div>
		
	</div>

@stop