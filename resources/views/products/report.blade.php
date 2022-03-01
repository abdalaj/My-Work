@extends('layouts.app')
@section('title',trans('front.productsreport'))
@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			@lang('front.productsreport')
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		@include('layouts.partial.filter')
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
				{{-- <div class="box-header">
                     <h3 class="box-title">Data Table With Full Features</h3>
                 </div>--}}
				<!-- /.box-header -->
					<div class="box-body">
						<table id="dataList" class="table table-bordered">
							<thead>
							<tr>
								<th>#</th>
								<th>@lang('front.product')</th>
								<th>@lang('front.purchases')</th>
								<th>@lang('front.purchasereturns')</th>
								<th>@lang('front.orders')</th>
                                <th>@lang('front.ordersreturns')</th>
                                <th>@lang('front.observe')</th>
                                <th>@lang('front.quantity')</th>
								<th class="no-sort"></th>
							</tr>
							</thead>
							<tbody>
							@foreach($products as $product)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$product->name}}</td>
									<td>{{$product->purchaseQty}}</td>
									<td>{{$product->purchasReturnsQty}}</td>
									<td>{{$product->salesQty}}</td>
                                    <td>{{$product->orderReturnQty}}</td>
                                    <td>{{$product->observe}}</td>
                                    <td>{!! $product->getTotalQuantity() !!}</td>
									<td></td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

@endsection
