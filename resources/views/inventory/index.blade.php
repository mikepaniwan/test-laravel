@extends('../template')


@section('content')

<a href="{{ route('inventory.create') }}">Add</a>

@if(session()->has("message"))
	<h3>Message: {{ session("message") }}</h3>
@endif

<form action="{{ route('inventory.index') }}" method="get">
	<div class="row">
		<div class="col-md-6">
			<input class="form-control" type="text" name="search">
		</div>
		<div class="col-md-6">
			<input type="submit" class="btn" value="Search">
		</div>
	</div>
	
	
</form>

@if(Request::has('search'))
	<h3>Search: {{ Request::input('search') }}</h3>
@endif

<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Value</th>
			<th>Place</th>
			<th>Operation</th>
		</tr>
	</thead>
	<tbody>
		@foreach($inventories as $inventory)
		<tr>
			<td>{{ $inventory->id }}</td>
			<td>{{ $inventory->name }}</td>
			<td>{{ $inventory->value }}</td>
			<td>
				@foreach($inventory->getPlaces as $place)
				{{ $place->province }} {{ $place->count }} <br>
				@endforeach
			</td>
			<td>
				<form action="{{ route('inventory.destroy',['id' => $inventory->id]) }}" method="post">

					<a href="{{ route('inventory.show',['id' => $inventory->id]) }}">Show</a>
					<a href="{{ route('inventory.edit',['id' => $inventory->id]) }}">Edit</a>

					<input type="hidden" name="_method"  value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<input type="submit" onclick="return confirm('Are you sure?');" value="Delete">
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<?php echo $inventories->appends(['search' => Request::input('search')])->render(); ?>

@endsection


