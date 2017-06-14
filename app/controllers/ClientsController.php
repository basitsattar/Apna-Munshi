<?php

class ClientsController extends BaseController {

	public function add(){
		$client=new Client;
		$client->client_name=Input::get('name');
		$client->client_email=Input::get('email');
		$client->client_city=Input::get('city');
		$client->client_phone=Input::get('number');
		$client->client_balance=Input::get('balance');
		$client->factory_id=Input::get('fid');
		$client->save();
		return Redirect::intended('/');
	}
	public function update(){
		$id=Input::get('id');
		$client=Client::find($id);
		$client->client_name=Input::get('name');
		$client->client_email=Input::get('email');
		$client->client_city=Input::get('city');
		$client->client_phone=Input::get('number');
		$client->client_balance=Input::get('balance');
		$client->factory_id=Input::get('fid');
		$client->save();
		return Redirect::intended('/');
	}
	public function post_prices(){
		$id=$_POST['client_id'];
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		$products=Product::with('prices')->where('factory_id','=',$factory[0]->id)->get();
		return View::make("ajax.price_table")->with(array('products'=>$products,'factory'=>$factory,"id"=>$id));
	}

	public function post_item_price(){
		$client_id=$_POST['client_id'];
		$item_id=$_POST['item_id'];
		$price=DB::table('price')->where('client_id',$client_id)
		->where('product_id',$item_id)->pluck('price');
		return $price;
	}
}
