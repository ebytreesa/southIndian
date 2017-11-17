<?php

class AdminController extends BaseController {

	

	public function admin()
	{
		return View::make('admin.admin');
	}

	public function createUser()
	{
		return View::make('users.createUser');
	}
	public function postCreateUser()
	{
		$messages	= array(
			'unique'=> 'brugernavnet er optaget',
			'image' => 'du skal vælg en billedefil'
			);
		$validator	= Validator::make(Input::All(), array(
			'username' => 'unique:users',
			'picture' => 'image'
			
			), $messages);
		if ($validator->fails())
		{
			return Redirect::to('/register')
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{
			
			$user = new User;
			$user->username= Input::get('username');
			$user->email= Input::get('email');
			$user->password	= Hash::make(Input::get('pass1'));
			$user->admin     = Input::get('role');	
			$user->city    = Input::get('city');			
			
			$user->save();
		}
		if ($user)
		{
			return Redirect::to('/admin/listUsers')->withSuccess('New user is created');
		}else
		{
			return Redirect::back()->withError('oops... something went wrong');
		}

	}

	
	

	public function logout()
		{
			Auth::logout();
			return Redirect::to('/')->withSuccess('you are logged out');
		}


	public function slides()
		{
			$slides = Slide::get();
			return View::make('slides.slides')->withSlides($slides);			
			
		}

	public function createSlide()
		{
			
			return View::make('slides.createSlide');			
			
		}

	public function postCreateSlide(){

			if(Input::hasFile('picture'))
			{
				$messages = array(
			
				'image' => 'du skal vælg en billedefil'
				);

				$validator = Validator::make(Input::All(),
					array(
				'picture' => 'image'				
					), $messages);

			if ($validator->fails())
			{ 
				return Redirect::back()
				->withErrors($validator->messages())
				->withInput(Input::all());
			}else
			{	

				$slide = new Slide;
					$filename = md5(microtime());
					Image::make(Input::file('picture'))->save(public_path() . '/slides/' . $filename);
					Image::make(Input::file('picture'))->resize(120,120)->save(public_path() . '/slides/' . $filename . '_thumb');
					$slide->image = $filename;
					$slide->save();
			    }
			}

		 return Redirect::to('admin/slides')->withSuccess('billeder er uploadet');	
		// }
			
	}		


	public function editSlide($id)
		{
			$slide = Slide::where('id', $id)->first();
			return View::make('slides.editSlide')->withSlide($slide);			
			
		}	

	public function postEditSlide(){
		$id = Input::get('id');
		$slide = Slide::where('id', $id)->first();
		
			if(Input::hasFile('picture'))
			{
				$messages = array(
			
				'image' => 'du skal vælg en billedefil'
				);

				$validator = Validator::make(Input::All(),
					array(
				'picture' => 'image'				
					), $messages);

			if ($validator->fails())
			{ 
				return Redirect::back()
				->withErrors($validator->messages())
				->withInput(Input::all());
			}else
			{	

				
					$filename = md5(microtime());
					Image::make(Input::file('picture'))->save(public_path() . '/slides/' . $filename);
					Image::make(Input::file('picture'))->resize(120,120)->save(public_path() . '/slides/' . $filename . '_thumb');
					$slide->image = $filename;
					$slide->save();
			    }
			}

		 return Redirect::to('admin/slides')->withSuccess('billeder er uploadet');

	}

	public function deleteSlide($id)
	{
		
		$slide = Slide::where('id', $id)->first();
		unlink(public_path(). '/slides/' . $slide->image);
		unlink(public_path(). '/slides/' . $slide->image. '_thumb');
		Slide::destroy($id);
		
		return Redirect::back()->withSuccess('billede blev slettet');
	}

	public function listUsers()
	{
		$users = User::get();
		return View::make('users.listUsers')->withUsers($users);
	}

	public function editUser($id)
	{
		$user = User::where('id', $id)->first();
		return View::make('users.editUser')->withUser($user);
	}

	public function postEditUser()
	{
		$id = Input::get('id');
		$messages	= array(
			
			'unique'=> 'brugernavnet er optaget',			
			'image' => 'du skal vælg en billedefil'
			);
		$validator	= Validator::make(Input::All(), array(
			'username'	=> 'unique:users,username,'.$id,
			'picture' => 'image'
			), $messages);
		if ($validator->fails())
		{ 
			return Redirect::back()
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{ 
			
			$user = User::where('id',Input::get('id'))->first();
			$user->username= Input::get('username');
			$user->email= Input::get('email');
			$user->admin = Input::get('role');
			$user->city    = Input::get('city');			
			
			
			if(Input::hasFile('picture'))
			{

			$filename = md5(microtime());

			Image::make(Input::file('picture'))->save(public_path() . '/users/' . $filename);
			Image::make(Input::file('picture'))->resize(120,120)->save(public_path() . '/users/' . $filename . '_thumb');
			$user->image = $filename;
		    }
			
			$user->save();
				
		}
		return Redirect::to('/admin/listUsers')->withSuccess('user er rettet');
		// if ($user)
		// {
		// 	$name = Auth::user()->username;
		// 	return Redirect::to('/profile/'.$name)->withSuccess('Brugeren blev rettet');
		// }else
		// {
		// 	return "der opstod en fejl";
		// }

	}




	public function deleteUser($id)
	{
		
		$user = User::where('id', $id)->first();
		if($user->image){
		 unlink(public_path(). '/users/' . $user->image);
		 unlink(public_path(). '/users/' . $user->image. '_thumb');
		}
		User::destroy($id);
		
		return Redirect::back()->withSuccess('user blev slettet');
	}

	public function userProfile($id){
		$user = User::where('id',$id)->first();
		return View::make('users.userProfile')->withUser($user);
	}

	public function profile($username)
		{
			$user = User::where('username', $username)->first();
			return View::make('users.profile')->withUser($user);
		}

	public function editProfile($username)
		{
			$user =  User::where('username',$username)->first();
			return View::make('users.editProfile')->withUser($user);
		}
	


}