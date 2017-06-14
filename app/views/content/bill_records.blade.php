<h3 class="text-center page-header">Bill Records</h3>
<div class="row">
	<div class="col-md-3">
		<div class="well">
				<form action="{{url('clients/prices')}}" method="post" id="price_form">
					 <label class="control-label">Select Client: </label>
					<p><select name="client" id="client" class="select2">
						<option value="" selected>Select Client</option>
						@foreach($clients as $client)
							<option value={{$client->id}}> {{$client->client_name}}</option>
						@endforeach
					</select></p>
				    <?php echo Form::token()?>
				    <p class="submit"><input type="submit" class="btn btn-success"  value="View Bill" /></p>
				</form>
		</div>
	</div>
	<div class="col-md-9 bills_place">
		@foreach($bills as $bill)
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart-o"></i>
					<span>Bill# {{$bill->id}}</span>
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
			<div class="box-content" id="bills_table">
				<table class="table table-striped table-bordered table-condensed">
					<tbody>
						<tr>
							<td class="text-bold">Bill#</td><td>{{$bill->id}}</td>
							<td class="text-bold">Bill Date</td><td>{{$bill->date}}</td>
							<td class="text-bold">Client Name</td><td>{{ucfirst(strtolower($bill->client_name))}}</td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered ">
					<thead>
						<tr>
							<th>#</th>
							<th>Product Name</th>
							<th>{{$factory[0]->parent_category_name}} - {{$factory[0]->child_category_name}}</th>
							<th>Unit Price</th>
							<th>Quantity</th>
							<th style="text-align:right;">Total Price</th>
						</tr>
					</thead>
					<tbody>
						<?php $count=1; ?>
						@foreach($bill->items as $item)
							<tr>
								<td>
									{{$count++}}
								</td>
								<td>
									{{$item->product->product_name}}
								</td>
								<td>
									{{($item->product->category->parent==null)?
									$item->product->category->category_name
									:$item->product->category->parent->category_name}}

									@if($item->product->category->parent!=null)
									- {{$item->product->category->category_name}}
									@endif
								</td>
								<td>
									{{$item->price}}
								</td>
								<td>
									{{$item->quantity}}
								</td>
								<td style="text-align:right;">
									{{($item->price)*($item->quantity)}}
								</td>
							</tr>
						@endforeach
							<tr>
								<td></td>
								<td class="text-bold">Total</td>
								<td colspan="3"></td>
								<td class="text-bold" style="text-align:right;">{{($bill->total)+($bill->discount)}}</td>
							</tr>
							<tr>
								<td></td>
								<td class="text-bold">Discount</td>
								<td colspan="3"></td>
								<td class="text-bold" style="text-align:right;">{{$bill->discount}}</td>
							</tr>
							<tr>
								<td></td>
								<td class="text-bold">Grand Total</td>
								<td colspan="3"></td>
								<td class="text-bold" style="text-align:right;">{{($bill->total)}}</td>
							</tr>
					</tody>
				</table>
			</div>
		</div>
		@endforeach
	</div>
</div>