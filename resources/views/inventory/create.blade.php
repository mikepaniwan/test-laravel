
<a href="{{ route('inventory.index') }}">Back</a>

<form action="{{ route('inventory.store') }}" method="post">
	Name : 
	<input type="text" name="name" value="{{ @$inventory->name }}">
	Value :
	<input type="number" name="value" value="{{ @$inventory->value }}">

	<input type="hidden" name="old_id" value="{{ @$inventory->id }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<input type="submit" value="Create">

</form>