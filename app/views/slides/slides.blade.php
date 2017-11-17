@extends('layouts.dashboard')

@section('title')
Image slider
@stop
@section('content')

<a href="{{ URL::to('/admin/createSlide') }}" class="btn btn-primary" >Create Slide</a>
<h3>Slider</h3>
<table class="table table-responsive table-striped" style="border: 1px solid gray;">
  		<thead class="thead-inverse" style="background-color: black; color: white;">
    		<tr >
     			  <th>#</th>
      			<th>Image</th>      			
            <th>Edit</th>
      			<th>Slet</th>
      		</tr>
 		 </thead>
  		<tbody>
  		@foreach($slides as $slide)
        <tr>
        <td></td>
          <td><img src="{{ URL::to('/slides/'.$slide->image.'_thumb') }}" class="img-responsive"></td>
                      
          
          <td><a href="{{ URL::to('/admin/editSlide/'.$slide->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a href="{{ URL::to('/admin/deleteSlide/'.$slide->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
            
          </tr>
      @endforeach
   		</tbody>
    </table>

@stop