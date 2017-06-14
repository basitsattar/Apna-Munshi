<h3 class="text-center page-header">Dashboard</h3>
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart-o"></i>
					<span>Stock</span>
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
							<th>Product Name</th>
							<th>{{$factory[0]->parent_category_name}}</th>
							<th>{{$factory[0]->child_category_name}}</th>
							<th>Stock</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
							@if($product->stock!=0)
							<tr>
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
							</tr>
							@endif
						@endforeach
					</tody>
				</table>
			</div>
		</div>
	</div>
</div>