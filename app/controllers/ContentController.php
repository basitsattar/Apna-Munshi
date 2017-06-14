<?php

class ContentController extends BaseController {

	public function get_products(){
		$update=false;
		$update_product=new Product;
		if($id=Input::get('id')!=null){
			$id=Input::get('id');
			$update_product=Product::find($id);
			$update=true;
		}
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		$products=Product::with('Category.children')->get();
		$categories=Category::where('factory_id','=',$factory[0]->id)->get();

		return View::make('/content/products')
		->with(array('factory'=>$factory,'categories'=>$categories,
			'products'=>$products,'update_product'=>$update_product,
			'update'=>$update));
	}
	public function get_categories(){
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		$categories=Category::with('children')->where('factory_id','=',$factory[0]->id)
		->where('parent_category','=',null)->get();

		return View::make('/content/categories')
		->with(array('factory'=>$factory,'categories'=>$categories));
	}
	public function get_employees(){
		$update=false;
		$update_employee=new Employee;
		if($id=Input::get('id')!=null){
			$id=Input::get('id');
			$update_employee=Employee::find($id);
			$update=true;
		}
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		$employees=Employee::where('factory_id','=',$factory[0]->id)->get();

		return View::make('/content/employees')
		->with(array('factory'=>$factory,'employees'=>$employees,
			'update_employee'=>$update_employee,'update'=>$update));
	}

	public function get_clients(){
		$update=false;
		$update_client=new Client;
		if($id=Input::get('id')!=null){
			$id=Input::get('id');
			$update_client=Client::find($id);
			$update=true;
		}
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		$clients=Client::where('factory_id','=',$factory[0]->id)->get();

		return View::make('/content/clients')
		->with(array('factory'=>$factory,'clients'=>$clients,
			'update_client'=>$update_client,'update'=>$update));
	}
	public function get_prices(){
		$update=false;
		$update_product=new Product;
		if($id=Input::get('id')!=null){
			$id=Input::get('id');
			$update_product=Product::find($id);
			$update=true;
		}
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		$products=Product::with('prices')->get();
		$prices=$products[0]->prices;
		$clients=Client::where('factory_id','=',$factory[0]->id)->get();

		return View::make('/content/prices')
		->with(array('factory'=>$factory,'clients'=>$clients,
			'products'=>$products,'update_product'=>$update_product,
			'update'=>$update,'prices'=>$prices));
	}
	public function get_dashboard(){
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		$products=Product::with('Category.children','prices')->get();
		$clients=Client::where('factory_id','=',$factory[0]->id)->get();

		return View::make('/content/dashboard')
		->with(array('factory'=>$factory,
			'products'=>$products,'clients'=>$clients));
	}
	public function get_new_bill(){
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		$products=Product::with('Category.children','prices')->get();
		$clients=Client::where('factory_id','=',$factory[0]->id)->get();

		return View::make('/content/new_bill')
		->with(array('factory'=>$factory,
			'products'=>$products,'clients'=>$clients));
	}
	public function get_bill_records(){
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		$bills=Bill::with('items.product.category.parent')->get();
		$products=Product::with('prices')->get();
		$clients=Client::where('factory_id','=',$factory[0]->id)->get();

		return View::make('/content/bill_records')
		->with(array('factory'=>$factory,'clients'=>$clients,
			'products'=>$products,'bills'=>$bills));
	}
	public function get_content($url){
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		return View::make('/content/'.$url)
		->with(array('factory'=>$factory));
	}
}
