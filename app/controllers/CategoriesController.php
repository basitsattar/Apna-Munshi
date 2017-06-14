<?php

class CategoriesController extends BaseController {

	public function add(){
		$category=new Category;
		$category->category_name=Input::get('name');
		$category->factory_id=Input::get('fid');
		$category->parent_category=(Input::get('parent_category')==="")?null:Input::get('parent_category');
		
		$category->save();
		return Redirect::intended('/');

	}
	public function update(){
		$id=Input::get('id');
		$category=Category::find($id);
		$category->category_name=Input::get('name');
		$category->category_id=(Input::get('parent_category')==="")?null:Input::get('parent_category');
		$category->save();

		return Redirect::intended('/');
	}
}
