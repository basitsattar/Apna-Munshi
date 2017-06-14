<table class="table table-striped table-hover table-bordered table-heading">
	<thead>
		<tr>
			<th>#</th>
			<th>Product Name</th>
			<th>{{$factory[0]->parent_category_name}}</th>
			<th>{{$factory[0]->child_category_name}}</th>
			<th>price</th>
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
				@foreach($product->prices as $price)
					@if($price->pivot->client_id==$id)
					{{$price->pivot->price}}
					@endif
				@endforeach
			</td>
			<td>
				<a href="content/prices?id={{$product->id}}" class="ajax-link"><i class="fa fa-pencil"></i></a>
			</td>
		</tr>
		@endforeach
	</tody>
</table>