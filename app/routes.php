<?php



Route::get('/','HomeController@index' );

Route::group(array('before' => 'csrf'), function(){
		// Route::post('/kontakt', array('uses' => 'HomeController@postKontakt', 'as' =>'postKontakt'));
		// Route::post('/admin', array('uses' => 'AdminController@postLogin', 'as' =>'postLogin'));
			
	});

Route::group(array('before' => 'guest'), function(){

 	Route::get('/login', 'UserController@login');
	Route::get('/register', 'UserController@register');
 	
	Route::group(array('before' => 'csrf'), function(){
 		Route::post('/register', array('uses' => 'UserController@postRegister', 'as' => 'postRegister'));
 		Route::post('/login', array('uses'	=> 'UserController@postLogin', 'as'	=> 'postLogin'));
 		
 	});
 });

Route::group(array('before'=> 'auth'), function(){
 	Route::get('/logout', 'UserController@logout');
  	Route::get('/profile/{name}', 'UserController@profile');
    Route::get('/profile/editUser/{id}', 'UserController@editUser'); 

 	Route::get('/profile/{name}/createMenu', 'MenuController@createMenu');
	Route::get('/profile/{name}/listMenu', 'MenuController@listMenu');
	Route::get('/profile/{name}/editMenu/{id}', 'MenuController@editMenu');
	Route::get('/profile/{name}/deleteMenu/{id}', 'MenuController@deleteMenu');
  
 	Route::group(array('before' => 'csrf'), function(){

 		Route::post('/profile/{name}/createMenu', array('uses' => 'MenuController@postCreateMenu', 'as' => 'postCreateMenu'));
		Route::post('/profile/{name}/editMenu', array('uses' => 'MenuController@postEditMenu', 'as' => 'postEditMenu'));
		Route::post('/profile/editUser/{id}', array('uses' => 'UserController@postEditUser', 'as' => 'postEditUser'));


 	});

	Route::group(array('before' => 'admin'), function(){
		Route::get('/admin', 'AdminController@admin');

		Route::get('/admin/contact', 'AdminController@contact');
		Route::get('/admin/editContact/{id}', 'AdminController@editContact');

		Route::get('/admin/createUser', 'AdminController@createUser');
		Route::get('/admin/listUsers', 'AdminController@listUsers');
		Route::get('/admin/userProfile/{id}', 'AdminController@userProfile');
		Route::get('/admin/editUser/{id}', 'AdminController@editUser');
		Route::get('/admin/deleteUser/{id}', 'AdminController@deleteUser');

		Route::get('/admin/slides', 'AdminController@slides');
		Route::get('/admin/editSlide/{id}', 'AdminController@editSlide');
		Route::get('/admin/createSlide', 'AdminController@createSlide');
		Route::get('/admin/deleteSlide/{id}', 'AdminController@deleteSlide');

		Route::get('/admin/listCities', 'CityController@listCities');
		Route::get('/admin/editCity/{id}', 'CityController@editCity');
		Route::get('/admin/createCity', 'CityController@createCity');
		Route::get('/admin/deleteCity/{id}', 'CityController@deleteCity');

		Route::get('/admin/createCategory', 'CatController@CreateCategory');
		Route::get('/admin/listCategories', 'CatController@listCategories');
		Route::get('/admin/editCategory/{id}', 'CatController@editCategory');
		Route::get('/admin/deleteCategory/{id}', 'CatController@deleteCategory');

		// Route::get('/admin/createMenu', 'CatController@createMenu');
		// Route::get('/admin/listMenu', 'CatController@listMenu');
		// Route::get('/admin/editMenu/{id}', 'CatController@editMenu');
		// Route::get('/admin/deleteMenu/{id}', 'CatController@deleteMenu');

		Route::get('/admin/addGalleri','AdminController@addGalleri');
		Route::get('/admin/deleteGalleri/{id}', 'AdminController@deleteGalleri');
		Route::group(array('before' => 'csrf'), function(){
			
			Route::post('/admin/editContact', array('uses' => 'AdminController@postEditContact', 'as' => 'postEditContact'));

			Route::post('/admin/createUser', array('uses' => 'AdminController@postCreateUser', 'as' => 'postCreateUser'));
			//Route::post('/admin/editUser', array('uses' => 'AdminController@postEditUser', 'as' => 'postEditUser'));

			Route::post('/admin/createCity', array('uses' => 'CityController@postCreateCity', 'as' => 'postCreateCity'));
			Route::post('/admin/editCity', array('uses' => 'CityController@postEditCity', 'as' => 'postEditCity'));

			Route::post('/admin/createCategory', array('uses' => 'CatController@postCreateCategory', 'as' => 'postCreateCategory'));
			Route::post('/admin/editCategory', array('uses' => 'CatController@postEditCategory', 'as' => 'postEditCategory'));

			// Route::post('/admin/createMenu', array('uses' => 'MenuController@postCreateMenu', 'as' => 'postCreateMenu'));
			// Route::post('/admin/editMenu', array('uses' => 'MenuController@postEditMenu', 'as' => 'postEditMenu'));


			Route::post('/admin/createSlide', array('uses' => 'AdminController@postCreateSlide', 'as' => 'postCreateSlide'));
			  Route::post('/admin/editSlide', array('uses' => 'AdminController@postEditSlide', 'as' => 'postEditSlide'));
	
		});	
	});
});

