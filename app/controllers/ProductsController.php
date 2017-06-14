<?php

class ProductsController extends BaseController {

	public function add(){

		$product=new product;
		$product->product_name=Input::get('name');
		$product->factory_id=Input::get('fid');
		$product->category_id=(Input::get('category')==="")?null:Input::get('category');
		if(Input::get('child_category')!="" && Input::get('category')!="" ){
			$product->category_id=Input::get('child_category');
		}
		$product->stock=Input::get('stock');
		$product->save();
		return Redirect::intended('/');

	}
	public function update(){
		$id=Input::get('id');
		$product=Product::find($id);
		$product->product_name=Input::get('name');
		$product->category_id=(Input::get('category')==="")?null:Input::get('category');
		if(Input::get('child_category')!="" && Input::get('category')!="" ){
			$product->category_id=Input::get('child_category');
		}
		$product->stock=Input::get('stock');
		$product->save();

		return Redirect::intended('/');
	}

	public function post_child_category(){
		$id=$_POST['category_id'];
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		$child_categories=Category::where('parent_category','=',$id)->get();
		return View::make("ajax.products_child_categories")->with(array('child_categories'=>$child_categories,'factory'=>$factory));
	}
}
