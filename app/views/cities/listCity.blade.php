@extends('layouts.dashboard')

@section('title')
City List
@stop
@section('content')

<a href="{{ URL::to('/admin/createCity') }}" class="btn btn-primary" >Create city</a>
<h3>Cities</h3>
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
  		@foreach($city as $city)
    		<tr>
        <td></td>
    			<td><a href="">{{ $city->name}}</a></td>
     			     				
     			
          <td><a href="{{ URL::to('/admin/editCity/'.$city->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
      			<td><a href="{{ URL::to('/admin/deleteCity/'.$city->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
      			
   		    </tr>
   		@endforeach
   		</tbody>
    </table>

@stop