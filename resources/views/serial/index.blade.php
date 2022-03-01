@extends('layouts.app')
@section('title','السريالات')
@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			@lang('front.stores')
			<a data-toggle="modal" data-target="#myModal" class="btn btn-success pull-right" href="{{route('serial.create')}}" ><i class="fa fa-plus"></i> @lang('front.Add')</a>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		@include('layouts.partial.printHeader')
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
				{{-- <div class="box-header">
                     <h3 class="box-title">Data Table With Full Features</h3>
                 </div>--}}
				<!-- /.box-header -->
					<div class="box-body">
						<table id="dataList" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>@lang('front.name')</th>
								<th>السريالات</th>
							</tr>
							</thead>
							<tbody>
								{{-- {{$serial}} --}}
							@foreach($serial as $ser)
								<tr>
									<td>{{$ser->name}}</td>
									{{-- <td>{{$serial}}</td> --}}
									<td>
										@foreach ($ser->Serial as $s)
										<table  class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>السريال</th>
													<th>حالة البيع</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>{{$s->serial}}</td>
													<td>
														@if ($s->is_sell==1)
														<span class="btn btn-danger">مباع</span>
														@else
														<span class="btn btn-success">ما زال موجود</span>
														@endif
														
												</tr>
											</tbody>
										</table>
									@endforeach
									</td>
									{{-- <td class="actions">
										<a data-toggle="modal" data-target="#myModal" href="{{route('stores.edit',$store)}}" class="btn btn-primary btn-xs">
											<i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
											@lang('front.edit')
										</a>
                                        @if(!$loop->first)
										<a class="btn btn-xs btn-danger remove-record" data-url="{{ route('stores.destroy',$store)  }}" data-id="{{$store->id}}">
											<i class="fa fa-trash"></i>
											@lang('front.delete')
										</a>
                                        @endif
										<a href="{{route('stores.show',$store)}}" class="btn btn-warning btn-xs">
											<i class="fa fa-eye" aria-hidden="true"></i>
											@lang('front.show')
										</a>

									</td> --}}
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

	<div id="myModal" class="modal fade" style="overflow:hidden;" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<p class="text-center"><div class="fa-3x text-center"><i class="fa fa-cog fa-spin"></i>                    @lang('front.Loading ....')                </div>                </p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">إغلاق</button>
				</div>
			</div>
		</div>
	</div>
@endsection
