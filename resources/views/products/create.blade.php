@extends('layouts.app')

@section('title',trans('front.Add Product'))
@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			@lang('front.Add')
			<small>
				@if($is_raw)
					مادة خام
				@else
				@lang('front.product')
				@endif
			</small>
		</h1>
	</section>
	<!-- Main content -->
	<form enctype="multipart/form-data"  action="{{route('products.store')}}" method="post">
		{{ csrf_field() }}
		@include('products._form')
	</form>
    @stop
