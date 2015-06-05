@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">My Order</div>

				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>When</th>
								<th>Name</th>
								<th>Price</th>							
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								<td>{{ $order->created_at }}</td>
								<td>{{ $order->getInventory->name }}</td>
								<td>{{ $order->getInventory->value }}</td>								
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
