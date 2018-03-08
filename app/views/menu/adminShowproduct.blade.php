@extends('layouts.dashboard')

@section('title')
{{ $product->name }}
@stop

@section('content')
<div class="container" style="width:90%; padding-bottom:30px;">
<a href="{{ URL::to('/admin/editProduct/'.$product->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a>
<a  style="margin-left:20px;" href="{{ URL::to('/admin/deleteProduct/'.$product->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
<hr style="border-color: grey;">


 
	
	<div class="row">

		<div class="col-sm-8" style=" border:;  ">
			<h3 class="" style=" font-weight:900; font-style:italic;margin-bottom:30px;">{{ $product->name }}</h3>
			<p>{{ nl2br($product->description) }}</p>	<br><br>
			<div class="row">
				<div class="col-sm-6">
					@if($product->offerprice == '0')
						<h4 style="font-weight:700">pris: {{ $product->price }},-</h4>
					@else
						<h4 style="color:grey; font-weight:700">Førpris: {{ $product->price }},-</h4>
						<h4 style="font-weight:700">Tilbudpris: {{ $product->offerprice }},-</h4>
					@endif
				</div>
				<div class="col-sm-6">
					<h4 style="color:blue; font-weight:700">Varenummer til bestilling: {{$product->id }}</h4>
				</div>
			</div>
			<a href="{{URL::previous()}}"><h4 style="color:blue; font-weight:700"> << Tilbage </h4></a>
		</div>
		<div class="col-sm-4"  style=" ">
			
			@if ($product->image)	
				<img src="{{ URL::to('/products/'.$product->image) }}" class="img-responsive  pull-right" style="height:300px; width:300px;margin-top:65px; border:1px solid grey; " >
		
			@else
				<img src="{{ URL::to('/images/default.png') }}" class="img-responsive" style="height:400px; width:400px;" >
			
			@endif
		</div>	
	
		
			

	</div>
	

 </div>

@stop
