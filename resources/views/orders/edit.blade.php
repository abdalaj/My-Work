	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			@lang('front.edit')
			<small>
				  {{$order->invoice_number}}
			</small>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
		</h1>
	</section>
	<!-- Main content -->
	<form action="{{route('orders.update',$order)}}" method="post">
		{{ csrf_field() }}
		{{ method_field('PUT')  }}
		@include('orders._form')
	</form>
    @include('orders.dicounts_bounse')
