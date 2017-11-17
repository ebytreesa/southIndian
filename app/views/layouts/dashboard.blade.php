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

		<div class="row" style="height:100px; border: ;">
			<div class="container" style="border: ;margin-top:20px;" >
				<div class="col-sm-9">
					<a class="navbar-brand" href="/" ><p style="font-size:28px; color:blue;font-family: "Times New Roman", Times, serif;"><strong>SOUTH INDIAN FOOD</strong></p></a>		
				</div>

				<div class="col-sm-3">
					@if (Auth::check() && Auth::user()->admin == 1)
						<a href="{{ URL::to('/logout') }}">Logout</a></li>				
					
					@endif
					
				</div>				
			</div>			
		</div>

		<nav class="navbar navbar-inverse" >
			<div class="container">
	 			<div class="navbar-header">
  					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" >
    					<span class="sr-only">Toggle navigation</span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
   						<span class="icon-bar"></span>
 					</button>
  					
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav">						 
											
					@if (Auth::check() && Auth::user()->admin == 1)			
						<li><a href="{{ URL::to('/admin') }}">Admin Panel</a></li>
						<li><a href="{{ URL::to('/admin/slides') }}">Slides</a></li>					
						<li><a href="{{ URL::to('/admin/listUsers') }}"> Users</a></li> 
						<li><a href="{{ URL::to('/admin/listCity') }}">Cities</a></li>	
						<li><a href="{{ URL::to('/admin/listMenu') }}">Menu</a></li>
						<li><a href="{{ URL::to('/admin/contact') }}">Kontakt</a></li>	
					
						<li><a href="{{ URL::to('/logout') }}">Logout</a></li>			 			
					@endif		
						
						
					</ul>
				</div>
			</div>
		</nav>

		<div class="container" style="height:auto; min-height:400px;">
			@yield('content')			
		</div>

		<div class="row" style="border:1px solid red;">
			<div class="footer" style="height:200px;">
				
			</div>
			
		</div>
	</div>

		
			

</body>
</html>