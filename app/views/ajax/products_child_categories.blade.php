<label class="control-label">{{$factory[0]->child_category_name}}: </label>
	<p><select name="child_category" id="child_category" class="select2">
		<option value="" selected>Select {{$factory[0]->child_category_name}}</option>
			@foreach($child_categories as $category)
					<option value={{$category->id}}> {{$category->category_name}}</option>
			@endforeach
</select></p>