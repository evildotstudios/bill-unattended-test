<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Your Ski Bill</title>
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/booststrap-theme.min.css">
	<link rel="stylesheet" href="css/bill.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Your Bill</h1>
		</div>
		<div class="row">
			<div class="col-md-8">
				<h3>Package</h3>
				<table class="table">
					<tr>
						<th>Type</th>
						<th>Cost</th>
					</tr>
					@if(count($data->package->subscriptions)<1)
						<tr>
							<td colspan="2"><em>No Subscriptions registered for the period</em></td>
						</tr>
					@else
						@foreach($data->package->subscriptions as $item)
							<tr>
								<td>{{$item->name}}</td>
								<td class="text-right">£{{money_format('%i', $item->cost)}}</td>
							</tr>
						@endforeach
					@endif
				</table>
				<span class="totalValue Label">Total</span>
				<span class="totalValue Numbers">£{{$data->total}}</span>
			</div>
			<div class="col-md-4">

				<strong>Generated:</strong> {{$data->statement->generated}}<br />
				<strong>Due:</strong> {{$data->statement->due}}<br />
				<strong>Billing Period:</strong><br />
				{{$data->statement->period->from}} <strong>to</strong> {{$data->statement->period->to}}
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h2>Calls</h2>
				<table class="table">
					<tr>
						<th>Date</th>
						<th>Number</th>
						<th>Duration</th>
						<th>Cost</th>
					</tr>
					@if(count($data->callCharges->calls)<1)
						<tr>
							<td colspan="4"><em>No calls registered for the period</em></td>
						</tr>
					@else
						@foreach($data->callCharges->calls as $call)
							<tr>
								<td>-</td>
								<td>{{$call->called}}</td>
								<td>{{$call->duration}}</td>
								<td>{{money_format('%i',$call->cost)}}</td>
							</tr>
						@endforeach
					@endif
				</table>
			</div>
			<div class="col-md-6">
				<h2>Pay per View</h2>
				<h4>Rented</h4>
				<table class="table">
					<tr>
						<th>Title</th>
						<th>Cost</th>
					</tr>
				@if(count($data->skyStore->rentals)<1)
					<tr>
						<td colspan="2"><em>No Rentals for the period</em></td>
					</tr>
				@else
					@foreach($data->skyStore->rentals as $rental)
						<tr>
							<td>{{$rental->title}}</td>
							<td>{{$rental->cost}}</td>
						</tr>
					@endforeach
				@endif
				</table>
				<h4>Bought</h4>
				<table class="table">
					<tr>
						<th>Title</th>
						<th>Cost</th>
					</tr>
				@if(count($data->skyStore->buyAndKeep)<1)
					<tr>
						<td colspan="2"><em>No Rentals for the period</em></td>
					</tr>
				@else
					@foreach($data->skyStore->buyAndKeep as $buy)
						<tr>
							<td>{{$buy->title}}</td>
							<td>{{$buy->cost}}</td>
						</tr>
					@endforeach
				@endif
				</table>
			</div>
		</div>
	</div>
</body>
</html>