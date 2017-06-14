<h3 class="text-center page-header">Categories</h3>
<div class="row">
	<div class="col-md-3">
		<div class="well">
			<h4 class="text-center">Add {{$factory[0]->parent_category_name}}</h4>
				<form action="{{ url('/categories/add') }}" method="post" id="add_category_form">
					<label for="name">Name:</label>
				    <label for="name" class="error" id="name-error"></label>
				    <p><input type="text" name="name" class="form-control" id="name" placeholder="Name" /></p>
				    <input type="hidden" name="fid" value="{{$factory[0]->id}}"/>
				    <?php echo Form::token()?>
				    <p class="submit"><input type="submit" class="btn btn-success"  value="Add {{$factory[0]->parent_category_name}}" /></p>
				</form>
		</div>

		<div class="well">
			<h4 class="text-center">Add {{$factory[0]->child_category_name}}</h4>
				<form action="{{ url('/categories/add') }}" method="post" id="add_category_form">
					<label for="name">Name:</label>
				    <label for="name" class="error" id="name-error"></label>
				    <p><input type="text" name="name" class="form-control" id="name" placeholder="Name" /></p>

				   	<label for="parent_category" >{{$factory[0]->parent_category_name}}:</label>
					<p><select  name="parent_category" class="select2" id="parent_category">
						<option value="" selected>Select {{$factory[0]->parent_category_name}}</option>
						@foreach($categories as $category)
							@if($category->parent_category==0)
							<option value={{$category->id}}>{{$category->category_name}}</option>
							@endif
						@endforeach
					</select></p>

				    <input type="hidden" name="fid" value="{{$factory[0]->id}}"/>
				    <?php echo Form::token()?>
				    <p class="submit"><input type="submit" class="btn btn-success"  value="Add {{$factory[0]->child_category_name}}" /></p>
				</form> 
		</div>
	</div>
	<div class="col-md-9">
		<?php $count=0;?>
		@foreach($categories as $category)
		<?php $count++;?>
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart-o"></i>
					<span>{{$count}} {{$category->category_name}}</span>
				</div>
				<div class="box-icons">
					<a href="content/categories?id={{$category->id}}" class="ajax-link">
						<i class="fa fa-pencil"></i>
					</a>
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
							<th>{{$factory[0]->child_category_name}}</th>
							<th>Edit</th>
						</tr>
					</thead>
					<tbody>
					@foreach($category->children as $category)
						
							<tr>
								<td>{{$count;}}</td>
								<td>{{$category->category_name}}</td>
								<td>
									<a href="content/categories?id={{$category->id}}" class="ajax-link"><i class="fa fa-pencil"></i></a>
								</td>
							</tr>
					@endforeach
					</tody>
				</table>
			</div>
		</div>
		@endforeach
	</div>
</div>