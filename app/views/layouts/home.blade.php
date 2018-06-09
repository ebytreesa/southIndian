<!doctype html>
<html lang="da">
<head>
<base href="/">
<meta charset="utf-8">
<title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/bootstrap.min.css') }}">
<script src="{{ URL::to('/app/lib/ang/angular-1.6.9/angular.js') }}"></script>
<script src="{{ URL::to('/app/lib/ang/angular-1.6.9/angular-route.js') }}"></script>
<script src="{{ URL::to('/app/lib/ang/angular-1.6.9/angular-cookies.js') }}"></script>

<script src="{{ URL::to('/js/jquery.min.js') }}"></script>
<script src="{{ URL::to('/js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::to('/js/bootstrap.min.js') }}"></script> 

<script src="{{ URL::to('/app/app.js') }}"></script>
{{-- <script src="{{ URL::to('/app/controllers/cities.js') }}"></script>
 --}}
 
</head>
<style>

 .error {
            color: red;
            font-size: 0.8em;
        }

 
</style>

<body>
	<div class="container"  style="background-color:;">
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

		<div class="row" style="height:200px; border:1px solid red;">
			<div class="container" style="border:;margin-top:20px;" >
				<div class="col-sm-9">
					<a class="navbar-brand" href="/" ><img src="{{ URL::to('/images/logo2.png') }}" class="image-responsive" ></a>		
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

		
	<script type="text/javascript">
		window.setTimeout(function() {
    		$(".alert").fadeTo(500, 0).slideUp(500, function(){
        		$(this).remove(); 
   		    });
		}, 1800);

	</script>			
  					

		

</body>
</html>