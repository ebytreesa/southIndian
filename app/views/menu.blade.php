@extends('layouts.home')

@section('title')
	South Indian 
@stop

@section('content')
<div class="container" ng-app="cart">
	<div class="row" ng-controller="cartController" style="position:relative;margin-top:20px;">
		<div class="col-sm-8 " ng-repeat="menu in menu" ng-cloak>

			

				<div class="row user_menu" style="border:1px solid black; margin-bottom:15px; padding:10px;">	
				
					<div class="col-md-3 menu_image">
						<img ng-src="{{ URL::to('/')}}/menu/@{{menu.image}}" class="image-responsive" style="height:120px; width:120px">
							
					</div>	
					<div class="col-md-9 ">
						<div class="col-md-9">
							<h4>@{{ menu.name }}</h4>
								
							<p><strong>Votes</strong>:@{{ menu.votes }}	</p>
							<p><strong>Description</strong>:@{{ menu.description }}	</p>
						</div> 
						{{-- @if(Auth::check())  --}}
						<div class="col-md-3">
							<select ng-model="qty">
							  <?php
								 for ($i=1; $i<=10; $i++) { ?>
								    <option value="<?php echo $i;?>"><?php echo $i;?></option>
								  							       
								<?php }?>
							</select>
							<button class="btn  btn-xs btn-primary" style="" ng-click="addItem(menu,qty)">Add</button> 				
					
						</div>
						{{-- @endif --}}
					</div>
						
				</div>
			</div>


		<div class="col-sm-4" style="border:1px solid black;min-height:100px;position:absolute;right:0;">
			<div class="right-box" style="padding:10px;">	
				<h2>Your cart</h2>
				<p>@{{cart.length}} items in your cart</p>
				<div class="cart_items" ng-repeat="c in cart">
					<table><tr><td>@{{c.name}}</td> <td>@{{c.qty}}</td></tr></table>
				</div>
			</div>
		</div>
	</div>	

</div>



<script>
 	var app = angular.module('cart', ['ngRoute','ngCookies'])
        .constant('API_URL', 'http://sherin.localhost/api/v1/'); 

    app.config(('$routeProvider','$locationProvider', function ($routeProvider,$locationProvider) {
        	 $routeProvider
        .when('/:city/:kitchen/menu', {
            
            controller: 'cartController'
        });
         $locationProvider.html5Mode(true);  	
        
	}));


         app.controller('cartController',function($scope, $http, API_URL, $routeParams,$cookies) {
         	//If you want to use URL attributes before the website is loaded
         	$scope.$on('$routeChangeSuccess', function () {
            
	            var city = $routeParams.city; console.log(city);
	            var kitchen = $routeParams.kitchen; console.log(kitchen);

	            $http.get(API_URL + city +"/" + kitchen + "/menu")
	            .then(function(response) {
	                $scope.menu = response.data;

	               console.log(response.data);

	               $scope.cart =[];
         		   $scope.total = 0;

         		   if(!angular.isUndefined($cookies.get('total'))){
		  $scope.total = parseFloat($cookies.get('total'));
		}
		//Sepetimiz daha önceden tanımlıysa onu çekelim
		if (!angular.isUndefined($cookies.get('cart'))) {
		 		$scope.cart =  $cookies.getObject('cart');
		}
         		   // Adding items to cart
		    	$scope.addItem = function(menu,qty){   	
		    	$scope.cart.push({menu,qty:qty}); 
		    		// if($scope.cart.length===0){
		    		// 	menu.count = 1;
		    		// 	$scope.cart.push(menu);
		    		// }else{
		    		// 	var repeat = false;


		    		// }


		    		var expireDate = new Date();
      expireDate.setDate(expireDate.getDate() + 1);
		 	$cookies.putObject('cart', $scope.cart,  {'expires': expireDate});
		 	$scope.cart = $cookies.getObject('cart');
		 
		  $scope.total += parseFloat(menu.price);
      $cookies.put('total', $scope.total,  {'expires': expireDate});
		    	
		    	}
		    		
		 // };
console.log($scope.cart);

            	}); 
			});


         	
		    
		});

    // $scope.add = function(id) {
    //     var url = API_URL + "addItem/"+ id;
        
                
    //     $http({
    //         method: 'POST',
    //         url: url,
    //         data: $.param($scope.menu),
    //         headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    //     }).success(function(response) {
    //         console.log(response);
    //         location.reload();
    //     }).error(function(response) {
    //         console.log(response);
    //         alert('This is embarassing. An error has occured. Please check the log for details');
    //     });
    // }
 
                
 
</script>


@stop
		