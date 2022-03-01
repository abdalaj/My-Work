
<section class="content-header">
    <h1>
       @lang('front.ordreturn')
        <small>
            {{$return->id}}
        </small>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>
                <a class="btn print-window pull-right" href="javascript:void(0)" onclick="PrintElem('{{route('returns.getPrint',$return->id)}}')" role="button">
                    <i class="fa fa-print" aria-hidden="true"></i>
                </a>
            </h1>
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="invoice-title">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="pull-left">
                                            <h3 style="line-height: 35px;">
                                                {!! $settings['SiteName'] !!}
                                            </h3>

                                            <div class="clearfix"></div>
                                            @if($settings['Address'])
                                                <span>{!!$settings['Address']!!}</span><br>
                                            @endif
                                            @if($settings['mobile'])
                                                <span style="line-height: 30px;">{{$settings['mobile']}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 style="line-height: 25px;" class="pull-right">@lang('front.invoicenumber') : {{$return->id}}<br>
                                            @lang('front.client') : {{$return->client->name}}<br>



                                            @lang('front.payment') : {{$return->is_cash?trans('front.cash'):trans('front.from previous balance')}} <br>
                                            @lang('front.date') : {{$return->return_date}}

                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            {{--<div class="panel-heading">
                                <h3 class="panel-title">اﻷصناف</h3>
                            </div>--}}
                            <div class="panel-body">
                                <div class="table-responsive">

                                    <h3 class="text-center">
                                        @if($return->return_type=='sales')
                                            @lang('front.ordreturn')
                                        @else
                                            @lang('front.purreturn')
                                        @endif
                                    </h3>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>@lang('front.product')</td>
                                            @if($settings['show_category_in_invoice'])
                                                <td>@lang('front.parent')</td>
                                            @endif
                                            @if($settings['show_stores_in_invoices']==1)
                                                <td>@lang('front.parent')</td>
                                            @endif
                                            <td>@lang('front.quantity')</td>
                                            <td>@lang('front.unit')</td>
                                            <td>@lang('front.price')</td>
                                            <td>@lang('front.total')</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach($return->details as $item)

                                            @php
                                                $subtotal = $item->pivot->qty*$item->pivot->price;
                                                $total += $subtotal;
                                            @endphp
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->name}}</td>
                                                @if($settings['show_category_in_invoice'])
                                                    <td>{{optional($item->category)->name}}</td>
                                                @endif
                                                @if($settings['show_stores_in_invoices']==1)
                                                    <td>{{$item->pivot->store_name}}</td>
                                                @endif
                                                <td>{{$item->pivot->qty}}</td>
                                                <td>{{$item->pivot->unit_name}}</td>
                                                <td>{{$item->pivot->price}}</td>
                                                <td>{{$subtotal}}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    <table class="table-condensed pull-right">
                                        <tbody>
                                        <tr>
                                            <td class="no-line text-center">@lang('front.total') : </td>
                                            <td class="no-line text-right">{{$total}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<style>
    .table tr>td{
        text-align: center;
    }
    .table thead tr>td{
        font-weight: bold;
    }
</style>