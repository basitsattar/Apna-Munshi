<h3 class="text-center page-header">Prices</h3>
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
				    <p class="submit"><input type="submit" class="btn btn-success"  value="{{$update?"Update Product":"Add Product"}}" /></p>
				</form>
		</div>
	</div>
	<div class="col-md-9">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart-o"></i>
					<span>Products</span>
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
			<div class="box-content" id="price_table">
				
			</div>
		</div>
	</div>
</div>