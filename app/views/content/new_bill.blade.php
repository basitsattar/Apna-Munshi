<h3 class="text-center page-header">Make New Bill</h3>
<div class="row">
	<form action="{{url('bill/add')}}" method="post" id="bill_form_1" class="form-horizontal">
	<div class="col-md-3">
		<div class="well">
					 <label class="control-label">Select Client: </label>
					<p><select name="client_bill" id="client_bill" class="select2">
						<option value="" selected>Select Client</option>
						@foreach($clients as $client)
							<option value={{$client->id}}> {{$client->client_name}}</option>
						@endforeach
					</select></p>

					<h3 class="text-center">or</h3>
					<label for="name">Add Name:</label>
				    <label for="name" class="error" id="name-error"></label>
				    <p><input type="text" name="name" class="form-control " id="name" placeholder="Name"/></p>
		</div>
		<div class="well">
			<label for="bill_date">Bill Date:</label>
			<label for="bill_date" class="error" id="bill_date-error"></label>
			<input type="text" class="form_datetime form-control datepicker" name="bill_date" id="bill_date"/>
		</div>
		<div class="well">

			<label for="bill_final_total">Bill Total:</label>
			<label for="bill_final_total" class="error" id="bill_final_total-error"></label>
			<input type="number" class="form-control" name="bill_final_total" id="bill_final_total" value="0" readonly/>

			<label for="bill_discount">Discount:</label>
			<label for="bill_discount" class="error" id="bill_discount-error"></label>
			<input type="number" class="form-control" name="bill_discount" id="bill_discount" value="0"/>

			<label for="bill_grand_total">Grand Total:</label>
			<label for="bill_grand_total" class="error" id="bill_grand_total-error"></label>
			<input type="number" class="form-control" name="bill_grand_total" id="bill_grand_total" value="0" readonly/>

			<label for="bill_paid">Paid:</label>
			<label for="bill_paid" class="error" id="bill_paid-error"></label>
			<input type="number" class="form-control" name="bill_paid" id="bill_paid" value="0"/>

			<label for="bill_remaining">Remaining:</label>
			<label for="bill_remaining" class="error" id="bill_remaining-error"></label>
			<input type="number" class="form-control" name="bill_remaining" id="bill_remaining" value="0" readonly/>

			<input type="hidden" name="fid" id="fid" value="{{$factory[0]->id}}"/>
		</div>
	</div>
	<div class="col-md-9">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart-o"></i>
					<span>Select Items</span>
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
					<div class="input_fields_wrap">
						
	   					<div class="form-group row">

	   						<div class="col-md-5">
		   						<label class="control-label">Select Product: </label><br/><br/>
								<p><select name="bill[1][item]" id="item_bill_1" data-id="1" class="select2">
									<option value="" selected>Select product</option>
									@foreach($products as $product)
										<option value={{$product->id}}> 
											{{$product->product_name}} 
											{{$product->category->parent_category==null?"- ".$product->category->category_name:""}} 
											{{$product->category->parent_category!=null?"- ".$product->category->parent->category_name." - ".$product->category->category_name:""}} 
										</option>
									@endforeach
								</select></p>
							</div>
							<div class="col-md-2">
	   							<label class="control-label">Quantity: </label><br/><br/>
	   							<input type="number" class="form-control" name="bill[1][quantity]" placeholder="Quantity" id="bill_quantity_1" data-id="1" min="0">
	   						</div>
	   						<div class="col-md-2">
	   							<label class="control-label">Unit Price: </label><br/><br/>
	   							<input type="number" class="form-control" name="bill[1][price]" id="bill_price_1" placeholder="Price" data-id="1" min="0">
	   						</div>
	   						<div class="col-md-2">
	   							<label class="control-label">Total: </label><br/><br/>
	   							<input type="number" class="form-control" name="total" id="bill_total_1" placeholder="Total" data-id="1" min="0">
	   						</div>
	   					</div>
					</div>
					<button class="add_field_button btn-primary col-md-3 pull-right">Add New Item</button><br/><br/>
					<div class="row">
						<div class="col-md-6">
							<a href="/content/new_bill" class="btn btn-success ajax-link">Cancel</a>
						</div>
						<div class="col-md-6">
							<input type="submit" name="bill_submit" value="Submit" class="btn btn-success"/>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>