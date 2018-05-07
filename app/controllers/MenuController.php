<?php

class MenuController extends BaseController {

	public function showMenu($name)
	{
		$menu = menu:: where('name', $name)->first();
		return View::make('common.showPage')->withPage($menu);
	}

	public function adminShowMenu($id)
	{
		$menu = menu:: where('id', $id)->first();
		return View::make('menu.adminShowMenu')->withMenu($menu);
	}

	
	public function listmenu()
	{
		$menu = Menu::orderBY('id', 'desc')->paginate(10);
		return View::make('menu.listmenu')->withMenu($menu);
	}

	public function createmenu()
	{
		return View::make('menu.createmenu');
	}
	public function postCreatemenu()
	{
		$messages = array(
			
			'name.unique'=> 'item already exists in your menu',
			
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' =>'unique:menu,name,NULL,id,user_id,'.Auth::user()->id,
				
				'picture' => 'image'
					), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$menu 	= new menu;
			$menu->name = Input::get('name');
			$cat_id = Category::where('id',Input::get('category'))->first()->id;
			$menu->cat_id = $cat_id;
			$menu->description = Input::get('description');
			$menu->price = Input::get('price');
			$menu->user_id = Auth::user()->id;
			
			
			
			if(Input::hasFile('picture'))
			{
			$filename = md5(microtime());
			Image::make(Input::file('picture'))->save(public_path() . '/menu/' . $filename);
			Image::make(Input::file('picture'))->resize(120,120)->save(public_path() . '/menu/' . $filename . '_thumb');
			$menu->image = $filename;
		    }
			$menu->save() ;
			
			return Redirect::to('/profile/'.Auth::user()->username)->withSuccess('Ny menu blev oprettet');
		}

	}

	public function editMenu($name,$id)
	{
		$menu = Menu::where('id',$id)->first();
		// $username = User::where('name', $name)->name;
		return View::make('menu.editMenu')->withMenu($menu);
	}

	public function postEditMenu()
	{
		
		$id = Input::get('id');
		
				$messages = array(
			
			'name.unique'=> 'menu already exists',
			
			'image' => 'du skal vælg en billedefil'
			);
	
		$validator = Validator::make(Input::All(),
			array(
				'name' =>'unique:menu,name,'.$id,
				
				'picture' => 'image'
					), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	

			$menu	= menu::where('id',Input::get('id'))->first();
			
			$menu->name = Input::get('name');
			$cat_id = Category::where('id',Input::get('category'))->first()->id;
			$menu->cat_id = $cat_id;

			$menu->description = Input::get('description');
			$menu->price = Input::get('price');
			$menu->user_id = Auth::user()->id;
					
			
			if(Input::hasFile('picture'))
			{
			$filename = md5(microtime());
			Image::make(Input::file('picture'))->save(public_path() . '/menu/' . $filename);
			Image::make(Input::file('picture'))->resize(120,120)->save(public_path() . '/menu/' . $filename . '_thumb');
			$menu->image = $filename;
		    }
			$menu->save() ;
			
			return Redirect::to('/profile/'.Auth::user()->username)->withSuccess(' menu is edited');
		}


	}

	public function deleteMenu($name,$id)
	{
		$menu = menu::where('id', $id)->first();
		if($menu->image){
		 unlink(public_path(). '/menu/' . $menu->image);
		 unlink(public_path(). '/menu/' . $menu->image. '_thumb');
		}
		
		menu::destroy($id);
		
		return Redirect::to('/profile/'.Auth::user()->username)->withSuccess('menu is deleted');
	}


}
