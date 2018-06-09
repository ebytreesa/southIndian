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


		<div class="col-sm-4" style="border:1px solid black;min-height:100px;position:absolute;right:0;" ng-cloak>
			<div ng-show="cart.length == 0" class="right-box" style="padding:10px;">
				You have 0 items in your cart
			</div>
			<div ng-show="cart.length !== 0" class="right-box" style="padding:10px;" ng-cloak>	
				<h2>Your cart</h2>
				<p>@{{cart.length}} items in your cart</p>
				<table class="table">
					<thead><tr><th>item</th><th>qty</th><th>price</th><th>Delete</th></tr>
					</thead>
					<tbody>
						<tr class="cart_items" ng-repeat="c in cart" ng-cloak>
							<td>@{{c.item.name}}</td> <td>@{{c.qty}}</td> <td>@{{c.qty * c.item.price}}
							</td><td><a ng-click="removeItem($index)"><span class="glyphicon glyphicon-trash"></span></a></td>
						</tr>

						<tr><td></td><td>total</td><td ng-model="total">@{{total}}</td><td></td></tr>
					</tbody>
				</table>
				<button type="button" class="btn btn-primary" id="btn-save" ng-click="saveToDb()">Save</button>
				<button type="button" class="btn btn-success" id="btn-save" ng-click="checkout()">Checkout</button>
			</div>
		</div>
	</div>	

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Checkout</h4>
                        </div>
                        <div class="modal-body">
                            <form name="customerForm" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname" value="" 
                                        ng-model="customer.name" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="customers.name.$invalid && customers.name.$touched">Name field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="" 
                                        ng-model="customer.email" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="customers.email.$invalid && customers.email.$touched">Valid Email is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Contact Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="" 
                                        ng-model="customer.contact_number" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="customers.contact_number.$invalid && customers.contact_number.$touched">Contact number is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="" 
                                        ng-model="customer.address" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="customers.address.$invalid && customers.address.$touched">Address is required</span>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="customerForm.$invalid">Save changes</button>
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


    app.controller('cartController',function($scope, $http, API_URL, $routeParams,$cookies,$location,$window,$rootScope) {
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
			 
			 		$scope.total += parseInt(qty)*(item.price);console.log($scope.total);
	      			$cookies.put('total', $scope.total,  {'expires': expireDate});
		    	
		    	};

		    	$scope.removeItem = function($index){
		    	 	$scope.total -= parseInt($scope.cart[$index].qty)*parseFloat($scope.cart[$index].item.price);	console.log($scope.total);			 	 
      				  
		    	 	$scope.cart.splice($index,1);

		    	 	var expireDate = new Date();
		     		expireDate.setDate(expireDate.getDate() + 1);
		    	 	$cookies.putObject('cart', $scope.cart,  {'expires': expireDate});
				 	$scope.cart = $cookies.getObject('cart');

				 	$cookies.put('total', $scope.total,  {'expires': expireDate});

			 		
		    	
		    	};
console.log($scope.cart);
	
			$scope.checkout = function(){
					$('#myModal').modal('show');

			};

			$scope.saveToDb = function(){
				// var data = [];
    //         for (var i = 0; i<cart.length; i++) {                
    //             data.push({name: cart[i].name});                
    //         }
             $scope.customer ={};
				$http({
		            method: 'POST',
		            url: API_URL+"saveToDb",
		            data: $scope.cart,
		           // headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	            
	        	}).then(function success(response) {
	           	  
	           	 $cookies.remove('cart');
	           	  $cookies.remove('total');
	           	   console.log(response);
	           	       location.reload();
	           	      //$rootScope.message="success";
	           	      //$window.location.href= ('/');
	           	      alert('success');
	       		},function error(response) {
	            console.log(response);
	            alert('This is embarassing. An error has occured. Please check the log for details');
	        });
			};

	     });
	});


         	
		    
		});

                  
 
</script>


@stop
		