@extends('layouts.dashboard')

@section('title')
Page List
@stop
@section('content')

<a href="{{ URL::to('/admin/createCategory') }}" class="btn btn-primary" >Create Category</a>
<h3>Categories</h3>
<table class="table table-responsive table-striped" style="border: 1px solid gray;">
  		<thead class="thead-inverse" style="background-color: black; color: white;">
    		<tr >
     			  <th>#</th>
      			<th>Navn</th>      			
            <th>Edit</th>
      			<th>Slet</th>
      		</tr>
 		 </thead>
  		<tbody>
  		@foreach($cat as $cat)
    		<tr>
        <td></td>
    			<td><a href="{{ URL::to('/admin/category/'.$cat->id) }}">{{ $cat->name}}</a></td>
     			     				
     			
          <td><a href="{{ URL::to('/admin/editCategory/'.$cat->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
      			<td><a href="{{ URL::to('/admin/deleteCategory/'.$cat->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
      			
   		    </tr>
   		@endforeach
   		</tbody>
    </table>

@stop