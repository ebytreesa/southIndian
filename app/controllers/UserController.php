<?php

class UserController extends BaseController {
	public function register()
	{
		return View::make('users.register');
	}
	public function postRegister()
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
			$user->city= Input::get('city');
			$user->role     = Input::get('role');		
			
			$user->save();
		}
		if ($user)
		{
			return Redirect::to('/login')->withSuccess('Brugeren blev oprettet');
		}else
		{
			return "der opstod en fejl";
		}

	}

	public function login()
	{
		return View::make('users.login');
	}

	public function postLogin()
	{
		$userdata = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);
		if(Auth::attempt($userdata))
		{
			if(Auth::user()->role == 1){
				return Redirect::to('/admin')->withSuccess('Admin is logged in');
			}else{
				$name = Auth::user()->username;
				return Redirect::to('/profile/'.$name)->withSuccess('You are now logged in');
			}			
		}else
		{
			return Redirect::to('/login')->withError('username or password invalid');
		}				
		
	}


	public function logout()
		{
			Auth::logout();

			return Redirect::to('/')->withSuccess('Du er logged out');
			
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
			$user->role = Input::get('role');
			$user->city = Input::get('city');
			
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
			return View::make('profile.profile')->withUser($user);
		}

	public function editProfile($username)
		{
			$user =  User::where('username',$username)->first();
			return View::make('users.editProfile')->withUser($user);
		}

}