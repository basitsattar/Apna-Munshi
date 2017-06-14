<h3 class="text-center page-header">Clients</h3>
<div class="row">
	<div class="col-md-3">
		<div class="well">
			<h4 class="text-center">{{$update?"Update Client":"Add Client"}}</h4>
				<form action="{{ url($update?'/clients/update':'/clients/add') }}" method="post" id="add_client_form">
						<label for="name">Name:</label>
				    	<label for="name" class="error" id="name-error"></label>
				    	<p><input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$update_client->client_name}}" /></p>

				    	<label for="email">Email:</label>
				    	<label for="email" class="error" id="email-error"></label>
				    	<p><input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{$update_client->client_email}}"  /></p>

				    	<label for="city">City:</label>
				    	<label for="city" class="error" id="city-error"></label>
				    	<p><input type="text" name="city" class="form-control" id="city" placeholder="City"  value="{{$update_client->client_city}}" /></p>

						<label for="number">Phone Number:</label>
				    	<label for="number" class="error" id="number-error"></label>
				    	<p><input type="text" name="number" class="form-control" id="number" placeholder="Phone Number" value="{{$update_client->client_phone}}"  /></p>

				    	<label for="balance">previous balance:</label>
				    	<label for="balance" class="error" id="balance-error"></label>
				    	<p><input type="text" name="balance" class="form-control" id="balance" placeholder="Previous Balance" value="{{$update_client->client_balance}}"  /></p>

				    <input type="hidden" name="fid" value="{{$factory[0]->id}}"/>
				    <p class="submit"><input type="submit" class="btn btn-success"  value="{{$update?"Update Client":"Add Client"}}" /></p>
				</form> 
		</div>
	</div>
	<div class="col-md-9">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart-o"></i>
					<span>Clients</span>
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
							<th>City</th>
							<th>Phone</th>
							<th>Balance</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $count=0;?>
						@foreach($clients as $client)
						<?php $count++;?>
						<tr>
							<td>{{$count;}}</td>
							<td>{{$client->client_name}}</td>
							<td>{{$client->client_email}}</td>
							<td>{{$client->client_city}}</td>
							<td>{{$client->client_phone}}</td>
							<td>{{$client->client_balance}}</td>
							<td>
								<a href="content/clients?id={{$client->id}}" class="ajax-link"><i class="fa fa-pencil"></i></a>
							</td>
						</tr>
						@endforeach
					</tody>
				</table>
			</div>
		</div>
	</div>
</div>