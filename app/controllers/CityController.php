<?php

class CityController extends BaseController {
	public function listCities()
	{
		$city = City::get();
		return View::make('cities.listCity')->withcity($city);
	}

	public function adminShowCity($id)
	{
		$city = City::where('id',$id)->first();
		return View::make('cities.listCity')->withcity($city);
	}


	public function createCity()
	{		 
		return View::make('cities.createCity');
	}

	public function postCreateCity()
	{
		$messages = array(
			'unique'=> 'City er taget',
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' =>'unique:cities'	), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$city 	= new City;
			$city->name = Input::get('name');
			$city->save() ;
			
			return Redirect::to('/admin/listCities')->withSuccess('City is added to the list');
		}

	}

	public function editCity($id)
	{	
		$city 	= City::where('id', $id)->first();	 
		return View::make('cities.editCity')->withcity($city);
	}

	public function postEditCity()
	{
		$id =  Input::get('id');
		$messages = array(
			'unique'=> 'City er taget'
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' =>'unique:cities,name,'.$id	), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$city 	= City::where('id', Input::get('id'))->first();
			$city->name = Input::get('name');
			$city->save() ;
			
			return Redirect::to('/admin/listCities')->withSuccess('City blev redegeret');
		}

	}


	public function deleteCity($id)
	{
			
		City::destroy($id);
		return Redirect::to('/admin/listCities')->withError('one City deleted');
	}
}

