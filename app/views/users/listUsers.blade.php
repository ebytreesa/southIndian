@extends('layouts.dashboard')

@section('title')
list of Users
@stop
@section('content')

  <a href="{{ URL::to('/admin/createUser') }}" class="btn btn-primary">Create user</a>

<h3>User List</h3>
<table class="table table-responsive table-striped" style="border: 1px solid gray;">
  		<thead class="thead-inverse" style="background-color: black; color: white;">
    		<tr >
     			<th>#</th>
      			<th>Username</th>
      			<th>Email</th>
            <th>City</th>
            <th>Role</th>
            <th>Edit</th>
      			<th>Slet</th>
      		</tr>
 		 </thead>
  		<tbody>
  		@foreach($users as $user)
    		<tr>
    			<td>#</td>
     			<td> <a href="{{ URL::to('/admin/userProfile/'.$user->id) }}">{{ $user->username }}</a></td>     				
     			<td>{{ $user->email}}</td>
          <td>{{ $user->city}}</td>
          @if ($user->admin == 0)
            <td>user</td>
          @elseif ($user->admin == 1)
            <td>Admin</td>
          @else
            <td>editor</td>
          @endif

          <td><a href="{{ URL::to('/admin/editUser/'.$user->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
      			<td><a href="{{ URL::to('/admin/deleteUser/'.$user->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
      			
   		    </tr>
   		@endforeach
   		</tbody>
    </table>

@stop