<?php

class RegistrationController extends BaseController {


	public function registerCompany()
	{
		 $inputData = Input::get('formData');
    	parse_str($inputData, $formFields); 

		$rules=array(
		'username' => 'required|min:5|unique:users',
		'company' => 'required',
		'description' => 'required',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required|min:8',
        'email' => 'required|email|unique:users'
        );
		$validator = Validator::make($formFields,$rules);
		if($validator->fails()){
			$messages = $validator->messages();
			$response = array('fail' => true,'messages' => $messages );
        	return Response::json($response);
		}

		$user = new User;
	 	$company=new Company;
	 	$factory=new Factory;
		$user->username = $formFields['username'];
	 	$user->password = Hash::make($formFields['password']);
	 	$user->email = $formFields['email'];
	 	$user->save();
	 	$company->company_name=$formFields['company'];
	 	$company->company_description=$formFields['description'];
	 	$company->owner()->associate($user);
	 	$company->save();
	 	$factory->company()->associate($company);
		$factory->factory_name=$company->company_name;
		$factory->save();
	 	Auth::login($user);
		$response = array('success' => true);
		return Response::json($response);
	}

}
