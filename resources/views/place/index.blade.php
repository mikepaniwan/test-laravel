<a href="{{ route('place.create') }}">Add</a>

@if(session()->has("message"))
	<h3>Message: {{ session("message") }}</h3>
@endif

<table border="1" width="100%">
	<thead>
		<tr>
			<th>ID</th>
			<th>Inventory ID</th>
			<th>Province</th>
			<th>Count</th>
		</tr>
	</thead>
	<tbody>
		@foreach($places as $place)
		<tr>
			<td>{{ $place->id }}</td>
			<td>{{ $place->getInventory->name }}</td>
			<td>{{ $place->province }}</td>
			<td>{{ $place->count }}</td>
		</tr>
		@endforeach
	</tbody>
</table>