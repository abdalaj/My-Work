@extends('layouts.app')
@section('title',$store->name)
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('front.show') - {{$store->name}}
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                {{-- <div class="box-header">
                     <h3 class="box-title">Data Table With Full Features</h3>
                 </div>--}}
                <!-- /.box-header -->
                    <div class="box-body">
                        <table id="dataList" class="table table-bordered table-striped dataTableTT">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('front.product')</th>
                                <th>@lang('front.quantity')</th>
                                <th>@lang('front.unit')</th>
                                <th>@lang('front.price')</th>
                                <th>@lang('front.total')</th>
                                <th class="no-sort"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach($list as $product)
                                <tr>
                                    @php
                                        $cost = $product->getCost();
                                        $qty = $product->qty-$product->sale_count;
                                        $subtotal = $cost * $qty;
                                        $total += $subtotal;
                                    @endphp
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->product->name}}</td>
                                    <td>{{$qty}}</td>
                                    <td>{{$product->unit->name}}</td>
                                    <td>{{$cost}}</td>
                                    <td>{{$subtotal}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{$total}}</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="text-center">
                        {{$list->render()}}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
