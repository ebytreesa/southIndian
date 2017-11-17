<!doctype html>
<html lang="da">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/bootstrap.min.js"></script>

 
</head>
<style>

 .error {
            color: red;
            font-size: 0.8em;
        }

 
</style>

<body>
	<div class="container-fluid"  style="background-color:;">
		<div class="container">
			@if ( Session::has('success'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('success') }}
			</div>
			@endif
			@if ( Session::has('error'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					{{ Session::get('error') }}
				</div>
			@endif
		</div>

		<div class="row" style="height:100px; border:">
			<div class="container" style="border:;margin-top:20px;" >
				<div class="col-sm-9">
					<a class="navbar-brand" href="/" ><p style="font-size:28px; color:blue;font-family: "Times New Roman", Times, serif;"><strong>SOUTH INDIAN FOOD</strong></p></a>		
				</div>

				<div class="col-sm-3">
					@if (Auth::check())
						@if (Auth::user()->admin == 1)
							<a href="{{ URL::to('/admin') }}">Admin</a></li>
						@else
							<a href="{{ URL::to('/profile/'.Auth::user()->username) }}">profile</a></li>
						@endif
						<a href="{{ URL::to('/logout') }}">Logout</a></li>	 					
					@else							
						<a href="{{ URL::to('/login') }}">Sign in</a> <span> /</span>
						<a href="{{ URL::to('/register') }}">Sign Up</a></li>
					@endif
					
				</div>				
			</div>			
		</div>

		<div class="row" style="height:auto; min-height:400px;">
			@yield('content')			
		</div>

		<div class="row" style="border:1px solid red;">
			<div class="footer" style="height:200px;">
				
			</div>
			
		</div>
	</div>

		
				<div class="col-md-3 " >		
					<form class="navbar-form" role="search">
   						 <div class="input-group search" >
      						<input class="" name="search" id="search" type="text" style="height:34px;">
     						 <div class="input-group-btn">
        						<button class="btn btn-small btn-primary" type="submit">search</i></button>
      						</div>
    					</div>
  					

		

</body>
</html>