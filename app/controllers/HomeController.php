<?php

class HomeController extends BaseController {

	public function index()
	{
		return View::make('index');
	}
	public function galleri()
	{
		
		$galleri = Galleri::get();
		return View::make('galleri')->withGalleri($galleri);
		
	}
	public function about()
	{
		return View::make('about');
	}

	public function postSubmitCity()
	{

		 $city = Input::get('city');
		$kitchens = User::where('city', $city)->get(); 
		return View::make('showCity')->withKitchens($kitchens)->withCity($city);
	}
	public function viewMenu($city,$kitchen){
		return View::make('menu');
	}


	public function menu($city,$kitchen)
	{
		//$city_id = City::where('name',$city)->first()->id;
		$kitchen_id = User::where('username',$kitchen)->first()->id;

		$menu = Menu::where('user_id',$kitchen_id)->get();
		return $menu;
	}

	public function menu1($city,$kitchen)
	{
		$kitchen_id = User::where('username',$kitchen)->first()->id;
		$menu = Menu::where('user_id',$kitchen_id)->get();
		return View::make('menu1')->withMenu($menu);
	}

	public function kontakt()
	{

		return View::make('kontakt');
	}

	public function postKontakt()
	{
		
		$kontakt = new Contact;
		$kontakt->name = input::get('name');
		$kontakt->email = input::get('email');
		$kontakt->message = input::get('message');
		$kontakt->save();
		return Redirect::back()->withSuccess("your message has been sent");
	}


	public function addItem($id){
		
	}

}
