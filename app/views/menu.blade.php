@extends('layouts.home')

@section('title')
	South Indian 
@stop

@section('content')
<div class="container" ng-app="cart">
	<div class="row" ng-controller="cartController" style="position:relative;margin-top:20px;">
		<div class="col-sm-8 " ng-repeat="item in items" ng-cloak>

			

				<div class="row user_menu" style="border:1px solid black; margin-bottom:15px; padding:10px;">	
				
					<div class="col-md-3 item_image">
						<img ng-src="{{ URL::to('/')}}/menu/@{{item.image}}" class="image-responsive" style="height:120px; width:120px">
							
					</div>	
					<div class="col-md-9 ">
						<div class="col-md-9">
							<h4>@{{ item.name }}</h4>
								
							<p><strong>Price</strong>:@{{ item.price }}	</p>
							<p><strong>Description</strong>:@{{ item.description }}	</p>
						</div> 
						{{-- @if(Auth::check())  --}}
						<div class="col-md-3">
							{{--  --}}

							<select ng-model="qty" ng-options=" q for q in quantity">
      
    						</select>

							<button class="btn  btn-xs btn-primary" style="" ng-click="addItemToCart(item,qty)">Add</button> 				
					
						</div>
						{{-- @endif --}}
					</div>
						
				</div>
			</div>


		<div class="col-sm-4" style="border:1px solid black;min-height:100px;position:absolute;right:0;">
			<div ng-show="cart.length == 0" class="right-box" style="padding:10px;">
				You have 0 items in your cart
			</div>
			<div ng-show="cart.length !== 0" class="right-box" style="padding:10px;">	
				<h2>Your cart</h2>
				<p>@{{cart.length}} items in your cart</p>
				<table class="table">
					<thead><tr><th>item</th><th>qty</th><th>price</th><th>Delete</th></tr>
					</thead>
					<tbody>
						<tr class="cart_items" ng-repeat="c in cart">
							<td>@{{c.item.name}}</td> <td>@{{c.qty}}</td> <td>@{{c.qty * c.item.price}}
							</td><td><a ng-click="removeItem($index)"><span class="glyphicon glyphicon-trash"></span></a></td>
						</tr>

						<tr><td></td><td>total</td><td ng-model="total">@{{total}}</td><td></td></tr>
					</tbody>
				</table>
				<button type="button" class="btn btn-primary" id="btn-save" ng-click="saveToDb(cart)">Save</button>
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
	                $scope.items = response.data;
	                
	                // selcet dropdown menu
	                $scope.quantity = [1,2,3,4,5,6,7,8,9,10];
	                 $scope.qty = 1; //selected quantity

	               console.log($scope.items);

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
		    	$scope.addItemToCart = function(item,qty){   	
		    	//$scope.cart.push({menu,qty:qty}); 
		    		if($scope.cart.length===0){
		    			//item.count = ;
		    			$scope.cart.push({item,qty:qty}); 
		    			// $scope.total = (item.price) * parseFloat(qty);
		    		}else{
		    			var repeat = false;
		    			
		    			for(var i=0; i<$scope.cart.length; i++){
		    				if($scope.cart[i].item.id === item.id){
		    					repeat = true; 
		    					$scope.cart[i].qty =parseInt($scope.cart[i].qty)+ parseInt(qty);
		    					
		    				}
		    					
		    			}
		    			if(!repeat){
		    				$scope.cart.push({item,qty:qty});
		    			}

		    		}


			    	var expireDate = new Date();
		     		expireDate.setDate(expireDate.getDate() + 1);
				 	$cookies.putObject('cart', $scope.cart,  {'expires': expireDate});
				 	$scope.cart = $cookies.getObject('cart');
			 
			 		$scope.total += parseInt(qty)*(item.price);
	      			$cookies.put('total', $scope.total,  {'expires': expireDate});
		    	
		    	};

		    	$scope.removeItem = function($index,c){
		    	 	$scope.cart.splice($index,1);

		    	 	var expireDate = new Date();
		     		expireDate.setDate(expireDate.getDate() + 1);
		    	 	$cookies.putObject('cart', $scope.cart,  {'expires': expireDate});
				 	$scope.cart = $cookies.getObject('cart');

			 		$scope.total -= parseInt(c.qty)*parseFloat(c.price);				 	 
      				 $cookies.put('total', $scope.total,  {'expires': expireDate});
		    	
		    	};
console.log($scope.cart);

			$scope.saveToDb = function(cart){
				var data = [];
            for (var i = 0; i<cart.length; i++) {                
                data.push({name: cart[i].name});                
            }
            console.log(data);
				$http({
		            method: 'POST',
		            url: API_URL+"saveToDb",
		            data: $.param($scope.c,$scope.total)
	            
	        }).success(function(response) {
	            console.log(response);
	            location.reload();
	        }).error(function(response) {
	            console.log(response);
	            alert('This is embarassing. An error has occured. Please check the log for details');
	        });
			};

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
		