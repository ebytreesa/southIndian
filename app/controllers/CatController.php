<?php

class CatController extends BaseController {
	public function listCategories()
	{
		$cat = Category::get();
		return View::make('cat.listCategories')->withCat($cat);
	}

	


	public function createCategory()
	{		 
		return View::make('cat.createCategory');
	}

	public function postCreateCategory()
	{
		$messages = array(
			'unique'=> 'category er taget',
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' =>'unique:categories'	), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$cat 	= new Category;
			$cat->name = Input::get('name');
			$cat->save() ;
			
			return Redirect::to('/admin/listCategories')->withSuccess('New category added to the list');
		}

	}

	public function editCategory($id)
	{	
		$cat 	= Category::where('id', $id)->first();	 
		return View::make('cat.editCategory')->withCat($cat);
	}

	public function postEditCategory()
	{
		$id =  Input::get('id');
		$messages = array(
			'unique'=> 'category er taget'
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' =>'unique:categories,name,'.$id	), $messages);

		if ($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator->messages())
			->withInput(Input::all());
		}else
		{	
			
			$cat 	= Category::where('id', Input::get('id'))->first();
			$cat->name = Input::get('name');
			$cat->save() ;
			
			return Redirect::to('/admin/listCategories')->withSuccess('category blev redegeret');
		}

	}


	public function deleteCategory($id)
	{
		
		Category::destroy($id);
		return Redirect::to('/admin/listCategories')->withError('category deleted');
	}
}