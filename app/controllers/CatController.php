<?php

class CatController extends BaseController {
	public function listCategory()
	{
		$cat = Category::get();
		return View::make('cat.listCategory')->withCat($cat);
	}

	public function adminShowCategory($id)
	{
		$cat = Category::where('id',$id)->first();
		$products = Product::where('cat_id', $id)->get();
		return View::make('cat.adminShowCategory')->withCat($cat)->withProducts($products);
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
			
			return Redirect::to('/admin/listCategory')->withSuccess('Ny category blev oprettet');
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
			
			return Redirect::to('/admin/listCategory')->withSuccess('category blev redegeret');
		}

	}


	public function deleteCategory($id)
	{
		$products = Product::where('cat_id',$id)->get();
		foreach($products as $p)
		{
			if($p->image){
				unlink(public_path(). '/products/' . $p->image);
		 		unlink(public_path(). '/products/' . $p->image. '_thumb');
			}
			$p->delete();
		}
		Category::destroy($id);
		return Redirect::to('/admin/listCategory')->withError('category slettet');
	}
}