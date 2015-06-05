<form action="{{ route('place.store') }}" method="post">
	Inventory
	<select name="inventory_id">
		@foreach($inventories as $inventory)
			<option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
		@endforeach
	</select>
	<br>
	Province 
	<input type="text" name="province">
	<br>
	Count
	<input type="text" name="count">
	<br>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit" value="Add">
</form>