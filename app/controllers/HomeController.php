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

}
