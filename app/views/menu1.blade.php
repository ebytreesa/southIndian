@extends('layouts.home')

@section('title')
	South Indian 
@stop

@section('content')
<div class="container">
	<div class="row"  style="position:relative;margin-top:20px;">
		<div class="col-sm-8">

			@foreach($menu as $menu)

				<div class="row user_menu" style="border:1px solid black; margin-bottom:15px; padding:10px;">	
				<?php
					 $cat = Category::where('id', $menu->cat_id)->first(); 
				?>	

					<div class="col-md-3 menu_image">
					<img src="{{ URL::to('/menu/'.$menu->image) }}" class="image-responsive" style="height:120px; width:120px">
							
					</div>	
					<div class="col-md-9 ">
						<div class="col-md-9">
							<h4><a href="{{ URL::to('/menu/'.$menu->id) }}">{{ $menu->name }}</a></h4>
							<p><strong>Category</strong>:{{ $cat->name }}</p>	
							<p><strong>Votes</strong>:{{ $menu->votes }}	</p>
							<p><strong>Description</strong>:{{ $menu->description }}	</p>
						</div>  
						<div class="col-md-3">
							<a href="{{ URL::to('/') }}" class="btn  btn-xs btn-primary" style="">Add</a>
							
					
						</div>
					</div>
						
				</div>


			@endforeach
		</div>

		<div class="col-sm-4" style="border:1px solid black;min-height:100px;position:absolute;right:0;">
			<div class="right-box" style="padding:10px;">	
				<h2>Your cart</h2>
				<p>0 items in your cart</p>
				<div class="cart_items">
					
				</div>
			</div>
		</div>
	</div>	

</div>





@stop
		