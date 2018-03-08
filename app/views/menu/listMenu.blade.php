@extends('layouts.dashboard')

@section('title')
Menu List
@stop
@section('content')

<a href="{{ URL::to('/admin/createMenu') }}" class="btn btn-primary" >Create Menu</a>
<h3>Menu</h3>
<table class="table table-responsive table-striped" style="border: 1px solid gray;">
  		<thead class="thead-inverse" style="background-color: black; color: white;">
    		<tr >
     			  <th>Varenummer</th>
      			<th>Navn</th>
            <th>Category</th>
            <th>Description</th>
            <th>image</th>
            <th>Pris</th>
            <th>Pris</th>                  			
            <th>Edit</th>
      			<th>Slet</th>
      		</tr>
 		 </thead>
  		<tbody>
  		@foreach($menus as $menu)
    		<tr>
        <td>{{$menu->id}}</td>
        <td><a href="{{ URL::to('/admin/menus/'.$menu->id) }}">{{$menu->name}}</a></td>
        <?php
           $cat = Category::where('id',$menu->cat_id)->first()->name;
        ?>
        <td>{{$cat}}</td>
        <td>{{ nl2br(str_limit($menu->description, $limit = 100, $end = '...'))}}</td>
        @if($menu->image)
        <td><img src="{{ URL::to('/menus/'.$menu->image.'_thumb') }}" class="img-responsive"></td>
        @else
        <td>Ingen billede</td>
        @endif
        <td>{{$menu->price}}</td>
        <td>{{$menu->offerprice}}</td>
      
    			    			     				
     			
          <td><a href="{{ URL::to('/admin/editmenu/'.$menu->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
      			<td><a href="{{ URL::to('/admin/deletemenu/'.$menu->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
      			
   		    </tr>
   		@endforeach
   		</tbody>
    </table>
<center>{{ $menus->links() }}</center>
@stop