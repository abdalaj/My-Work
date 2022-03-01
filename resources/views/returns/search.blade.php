@extends('layouts.app')

@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			@lang('front.Add')
			<small>

			</small>
		</h1>
	<!-- Main content -->
	<div class="col-md-12">
		<div class="col-md-8">
			<table class="table table-striped table-dark">
				<thead>
				  <tr>
					<th scope="col">#</th>
					<th scope="col">Invoice Num</th>
					<th scope="col">Order Num</th>
					<th scope="col">Store Name</th>
					<th scope="col">Product ID</th>
					<th scope="col">Unit ID</th>
					<th scope="col">Unit Name</th>
					<th scope="col">Product Name</th>
					<th scope="col">qty</th>
					<th scope="col">Price</th>
					<th scope="col">Cost</th>
					<th scope="col">Total</th>
					<th scope="col">Action</th>


				  </tr>
				</thead>
				<tbody>
					@foreach ($details as $user)
					<tr>
					<td>{{$user->id}}</td>
					<td>{{ $invoice_num}}</td>
					<td>{{ $user->order_id }}</td>
					<td>{{ $user->store_name }}</td>
					<td>{{ $user->product_id }}</td>
					<td>{{ $user->unit_id }}</td>
					<td>{{ $user->unit_name }}</td>
					<td>{{ $user->product_name }}</td>
					<td>{{ $user->qty }}</td>
					<td>{{ $user->price }}</td>
					<td>{{ $user->cost }}</td>
					<td>{{ $user->total }}</td>


					<td>
						<a href="{{ 'insert_return/' .$user->id .'/'.$invoice_num}}">
							<button   type="submit" class="btn btn-outline-primary" >مرتجع</button>
						</a>

					</td>

					</tr>
					@endforeach
				 				</tbody>
			  </table>
		</div>
	</div>


@stop
