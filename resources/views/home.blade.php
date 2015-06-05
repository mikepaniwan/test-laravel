@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">E-Commerce</div>

				<div class="panel-body">
					@if(session()->has("message"))
						<h3>Message: {{ session("message") }}</h3>
					@endif
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Name</th>
								<th>Price</th>
								<th>Operation</th>
							</tr>
						</thead>
						<tbody>
							@foreach($inventories as $inventory)
							<tr>
								<td>{{ $inventory->name }}</td>
								<td>{{ $inventory->value }}</td>
								<td>
									<a href="{{ route('user.order',['id' => $inventory->id]) }}" class="btn btn-primary">Buy</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
