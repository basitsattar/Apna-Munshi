<h3 class="text-center page-header">Employees</h3>
<div class="row">
	<div class="col-md-3">
		<div class="well">
			<h4 class="text-center">{{$update?"Update Employee":"Add Employee"}}</h4>
				<form action="{{ url($update?'/employees/update':'/employees/add') }}" method="post" id="add_client_form">
						<label for="name">Name:</label>
				    	<label for="name" class="error" id="name-error"></label>
				    	<p><input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$update_employee->employee_name}}"/></p>

				    	<label for="email">Email:</label>
				    	<label for="email" class="error" id="email-error"></label>
				    	<p><input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{$update_employee->employee_email}}" /></p>

				    	<label for="number">Phone Number:</label>
				    	<label for="number" class="error" id="number-error"></label>
				    	<p><input type="text" name="number" class="form-control" id="number" placeholder="Phone Number" value="{{$update_employee->employee_phone}}" /></p>

				    	<label for="designation">Designation:</label>
				    	<label for="designation" class="error" id="designation-error"></label>
				    	<p><input type="text" name="designation" class="form-control" id="designation" placeholder="Designation" value="{{$update_employee->employee_designation}}" /></p>

				    	<label for="salary">Salary:</label>
				    	<label for="salary" class="error" id="salary-error"></label>
				    	<p><input type="text" name="salary" class="form-control" id="salary" placeholder="Salary" value="{{$update_employee->employee_salary}}" /></p>

				    	<label for="balance">previous balance:</label>
				    	<label for="balance" class="error" id="balance-error"></label>
				    	<p><input type="text" name="balance" class="form-control" id="balance" placeholder="Previous Balance" value="{{$update_employee->employee_remaining_amount}}" /></p>

				    <input type="hidden" name="id" value="{{$update_employee->id}}"/>
				    <input type="hidden" name="fid" value="{{$factory[0]->id}}"/>
				    <p class="submit"><input type="submit" class="btn btn-success"  value="{{$update?"Update Employee":"Add Employee"}}" /></p>
				</form> 
		</div>
	</div>
	<div class="col-md-9">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart-o"></i>
					<span>Employees</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-hover table-bordered table-heading">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone number</th>
							<th>Designation</th>
							<th>Salary</th>
							<th>Balance</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $count=0;?>
						@foreach($employees as $employee)
						<?php $count++;?>
						<tr>
							<td>{{$count;}}</td>
							<td>{{$employee->employee_name}}</td>
							<td>{{$employee->employee_email}}</td>
							<td>{{$employee->employee_phone}}</td>
							<td>{{$employee->employee_designation}}</td>
							<td>{{$employee->employee_salary}}</td>
							<td>{{$employee->employee_remaining_amount}}</td>
							<td>
								<a href="content/employees?id={{$employee->id}}" class="ajax-link"><i class="fa fa-pencil"></i></a>
							</td>
						</tr>
						@endforeach
					</tody>
				</table>
			</div>
		</div>
	</div>
</div>