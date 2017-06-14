<h3 class="text-center page-header">Products</h3>
<div class="row">
	<div class="col-md-3">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart-o"></i>
					<span>{{$update?"Update Product":"Add Product"}}</span>
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
				<form action="{{ url($update?'/products/update':'/products/add') }}" method="post" id="add_product_form">
						<label for="name">Name:</label>
				    	<label for="name" class="error" id="name-error"></label>
				    	<p><input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{$update_product->product_name}}"/></p>

				    <label class="control-label">{{$factory[0]->parent_category_name}}: </label>
					<p><select name="category" id="category" class="select2">
						<option value="" selected>Select {{$factory[0]->parent_category_name}}</option>
						@foreach($categories as $category)
							@if($category->parent_category==null)
							<option value={{$category->id}} {{($update_product->category_id==$category->id)?"Selected":""}}>{{$category->category_name}}</option>
							@endif
						@endforeach
					</select></p>

					<div class="product_preloader">
						<img src="img/devoops_getdata.gif" alt="preloader"/>
					</div>

					<p id="child_category"></p>

					<label for="stock">Stock:</label>
				    <label for="stock" class="error" id="stock-error"></label>
				    <p><input type="text" name="stock" class="form-control" id="stock" placeholder="Stock" value="{{$update_product->stock}}"/></p>

				    <input type="hidden" name="fid" value="{{$factory[0]->id}}"/>
				    @if($update)
				   	<input type="hidden" name="id" value="{{$update_product->id}}"/>
				    @endif
				    <?php echo Form::token()?>
				    <p><input type="submit" class="btn btn-success"  value="{{$update?"Update Product":"Add Product"}}" /></p>
				</form> 
			</div>
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
			<div class="box-content">
				<table class="table table-striped table-hover table-bordered table-heading">
					<thead>
						<tr>
							<th>#</th>
							<th>Product Name</th>
							<th>{{$factory[0]->parent_category_name}}</th>
							<th>{{$factory[0]->child_category_name}}</th>
							<th>Stock</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $count=0;?>
						@foreach($products as $product)
						<?php $count++;?>
						<tr>
							<td>{{$count;}}</td>
							<td>{{$product->product_name}}</td>
							<td>
							@if($product->category!=null)

								{{($product->category->parent==null)?$product->category->category_name:$product->category->parent->category_name}}
							@endif
							</td>
							<td>
							@if($product->category!=null && $product->category->parent!=null)
								{{$product->category->category_name}}
							@endif
							</td>
							<td>
								{{$product->stock}}
							</td>
							<td>
								<a href="content/products?id={{$product->id}}" class="ajax-link"><i class="fa fa-pencil"></i></a>
							</td>
						</tr>
						@endforeach
					</tody>
				</table>
			</div>
		</div>
	</div>
</div>