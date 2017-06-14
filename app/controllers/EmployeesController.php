<?php

class EmployeesController extends BaseController {

	public function add(){
		
		$employee=new Employee;
		$employee->employee_name=Input::get('name');
		$employee->employee_email=Input::get('email');
		$employee->employee_phone=Input::get('number');
		$employee->employee_designation=Input::get('designation');
		$employee->employee_salary=Input::get('salary');
		$employee->employee_remaining_amount=Input::get('balance');
		$employee->factory_id=Input::get('fid');

		$employee->save();
		return Redirect::intended('/');

	}
	public function update(){
		$id=Input::get('id');
		$employee=Employee::find($id);
		$employee->employee_name=Input::get('name');
		$employee->employee_email=Input::get('email');
		$employee->employee_phone=Input::get('number');
		$employee->employee_designation=Input::get('designation');
		$employee->employee_salary=Input::get('salary');
		$employee->employee_remaining_amount=Input::get('balance');
		$employee->factory_id=Input::get('fid');

		$employee->save();
		return Redirect::intended('/');

	}
}
