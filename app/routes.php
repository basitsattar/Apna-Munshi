<?php

Route::filter('loggedcheck', function(){
	if (Auth::guest()) return Redirect::to('/home');
 });
//Route::when('*', 'csrf', array('post', 'put', 'delete'));

/*******************************************************************************
								Get Routes
*******************************************************************************/

Route::get('/',array('before'=>'loggedcheck',function(){
	return View::make('generic');
}));
Route::get('content/dashboard',array('before'=>'loggedcheck','uses'=>'ContentController@get_dashboard'));

Route::get('content/new_bill',array('before'=>'loggedcheck','uses'=>'ContentController@get_new_bill'));

Route::get('content/bill_records',array('before'=>'loggedcheck','uses'=>'ContentController@get_bill_records'));

Route::get('content/products',array('before'=>'loggedcheck','uses'=>'ContentController@get_products'));

Route::get('content/categories',array('before'=>'loggedcheck','uses'=>'ContentController@get_categories'));

Route::get('content/employees',array('before'=>'loggedcheck','uses'=>'ContentController@get_employees'));

Route::get('content/clients',array('before'=>'loggedcheck','uses'=>'ContentController@get_clients'));

Route::get('content/prices',array('before'=>'loggedcheck','uses'=>'ContentController@get_prices'));

Route::get('/content/{url?}',array('before'=>'loggedcheck','uses'=>'ContentController@get_content'));


Route::get('/home', function()
{
	return View::make('index');
});

Route::get('logout',array('as'=>'logout',function(){
	Auth::logout();
	return Redirect::to('/');
}));


/*******************************************************************************
								Post Routes
*******************************************************************************/

Route::post('products/add',array('as'=>'products.add','uses'=>'ProductsController@add'));

Route::post('products/update',array('as'=>'products.add','uses'=>'ProductsController@update'));

Route::post('products/child_category',array('as'=>'products.child_category','uses'=>'ProductsController@post_child_category'));

Route::post('categories/add',array('as'=>'categories.add','uses'=>'CategoriesController@add'));

Route::post('employees/add',array('as'=>'employees.add','uses'=>'EmployeesController@add'));

Route::post('employees/update',array('as'=>'employees.update','uses'=>'EmployeesController@update'));

Route::post('clients/add',array('as'=>'clients.add','uses'=>'ClientsController@add'));

Route::post('clients/update',array('as'=>'clients.update','uses'=>'ClientsController@update'));

Route::post('clients/prices',array('as'=>'clients.prices','uses'=>'ClientsController@post_prices'));

Route::post('clients/item_price',array('as'=>'clients.item_price','uses'=>'ClientsController@post_item_price'));

Route::post('bill/add',array('as'=>'bills.add','uses'=>'BillsController@add'));

/*User sign up and authentication roots*/

Route::post('registerCompany',array('as'=>'register','uses'=>'RegistrationController@registerCompany'));

Route::post('login', function(){

	$inputData = Input::get('formData');
    parse_str($inputData, $formFields); 

	$credentials['username']=$formFields['username'];
	$credentials['password']=$formFields['password'];

	if (Auth::attempt($credentials)) {
		return Response::json(array('success'=>'true',"login_form"=>"true"));
	}
		return Response::json(array('fail'=>'true',"login_form"=>"true"));
});
