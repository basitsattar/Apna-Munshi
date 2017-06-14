<?php

class BillsController extends BaseController {

	public function add(){
		$bill=new Bill;
		$bill->client_id=Input::get('client_bill')!=""?Input::get('client_bill'):null;
		$bill->client_name=Input::get('name');
		$bill->total=Input::get('bill_grand_total');
		$bill->discount=Input::get('bill_discount');
		$bill->remaining=Input::get('bill_remaining');
		$bill->paid=Input::get('bill_paid');
		$bill->date = date('Y-m-d', strtotime(str_replace('-', '/', Input::get('bill_date'))));
		$bill->factory_id=Input::get('fid');
		$bill->save();
		foreach( Input::get('bill') as $value ) {
			if($value['item']!="" && $value['quantity']!="" && $value['price']!=""){
				$item=new Item;
				$item->bill_id=$bill->id;
				$item->product_id=$value['item'];
				$item->quantity=$value['quantity'];
				$item->price=$value['price'];
				$item->factory_id=Input::get('fid');
				$item->save();
			}
		}
		return Input::get('bill');

	}
	public function update(){
	}
	public function post_bills(){
		$id=$_POST['client_id'];
		$company = Auth::user()->company()->take(1)->first();
		$factory=$company->factory()->get();
		$products=Product::with('prices')->where('factory_id','=',$factory[0]->id)->get();
		return View::make("ajax.price_table")->with(array('products'=>$products,'factory'=>$factory,"id"=>$id));
	}
}
