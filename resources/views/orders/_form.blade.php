
@if($type=='sales')
<input name="order[currency]" type="hidden" value="{{$order->currency?:currency()->getUserCurrency()}}">
@endif
<input id="invoiceType" type="hidden" value="{{$type}}" name="order[invoice_type]">
<input id="savePrint" name="savePrint" value="" type="hidden">
<input id="saveandPrintBarcode" name="saveandPrintBarcode" value="" type="hidden">
<input id="bounse" type="hidden" value="0" class="form-control">
<input id="bounse_unit_id" type="hidden" value="0" class="form-control">
<input id="isService" type="hidden" value="0" class="form-control">

<section class="content" >
<div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    @php
                        $useMarket = false;
                        if($settings['sales_marketer']==1 && $type=='sales'){
                            $useMarket = true;
                        }
                    @endphp
                        <div class="{{($type=='sales' && $useMarket)?'col-md-3':'col-md-4'}}">
                            <div class="form-group">
                                <label>@lang('front.date')</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input readonly name="order[invoice_date]" type="text" value="{{($order->invoice_date)?:date('Y-m-d')}}" @if($settings['enable_edit_date']==1) id="datepicker" @endif class="form-control">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="{{($useMarket)?'col-md-3':'col-md-4'}}">
                            <div class="form-group">
                                @php
                                    $salesMan = [];
                                    $marktersMan = [];
                                    if($type=='sales'){
                                        $title = trans('front.client');
                                        $defaultperson = \App\Person::whereIn('name',['???????? ????????','???????? ??????'])->first();
                                        $salesMan = \App\Employee::where('type','sales')->get();
                                        $marktersMan = \App\Employee::where('type','markter')->get();
                                        $userListRoute= route('person.getList',['type'=>'client']);
                                        $route = route('client.create',['req'=>'ajax']);
                                    }else{
                                        $title = trans('front.supplier');
                                        $defaultperson = \App\Person::whereIn('name',['???????? ????????','???????? ??????'])->first();
                                        $userListRoute= route('person.getList',['type'=>'supplier']);
                                        $route = route('supplier.create',['req'=>'ajax']);
                                    }
                                    if(isset($order->invoice_number)){
                                        $invoice_number = $order->invoice_number;
                                    }else{
                                        $lastItem = \App\Order::where('invoice_type',$type)
                                                ->orderby('id','DESC')
                                                ->first();
                                        $invoice_number = $lastItem?$lastItem->invoice_number+1:1;
                                    }
                                @endphp
                                <label>
                                    {{$title}}
                                </label>

                                <div class="input-group">
                                    <select data-ajax--url="{{$userListRoute}}" data-ajax--cache="true" data-placeholder="@lang('front.select')" id="personList" name="order[client_id]" required class="form-control select2">
                                        <option data-mobile="" value="">@lang('front.select')</option>
                                        @if($order->client_id)
                                            @php
                                                $per = \App\Person::find($order->client_id);
                                            @endphp
                                            <option points="{{$per->total_points}}" data-mobile="{{$per->mobile.' '.$per->mobile2}}" last_transaction="{{$per->last_transaction}}"  priceType="{{$per->priceType}}" rel="{{$per->total_due}}" selected value="{{$per->id}}">{{$per->name}}</option>
                                        @else
                                            @if($defaultperson)
                                                <option points="{{$defaultperson->total_points}}" data-mobile="{{$defaultperson->mobile.' '.$defaultperson->mobile2}}" last_transaction="{{$defaultperson->last_transaction}}"  priceType="{{$defaultperson->priceType}}" rel="{{$defaultperson->total_due}}" selected value="{{$defaultperson->id}}">{{$defaultperson->name}}</option>
                                            @endif
                                        @endif
                                        {{--@foreach($persons as $per)
                                            <option points="{{$per->total_points}}" data-mobile="{{$per->mobile.' '.$per->mobile2}}" last_transaction="{{$per->last_transaction}}"  priceType="{{$per->priceType}}" rel="{{$per->total_due}}" {{$per->id==$order->client_id||(empty($order->id) && $loop->iteration==1)?'selected':''}} value="{{$per->id}}">{{$per->name}}</option>
                                        @endforeach--}}
                                    </select>
                                    <div class="input-group-addon no-print" style="padding: 2px 5px;">
                                        <a href="{{$route}}" class="external" data-toggle="modal" data-target="#addPersonModal">
                                            <i class="fa fa-2x fa-plus-circle"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="manager_id" name="order[manager_id]" value="{{optional($order->saleMan)->manager_id}}">
                        <div class="{{($type=='sales' && $useMarket)?'col-md-3':'col-md-4'}}">
                            <div class="form-group">
                                <label>@lang('front.sale')</label>
                                <select data-placeholder="@lang('front.select')" name="order[sale_id]" class="form-control select2 salePersonSelect" style="width:100%;">
                                    <option value=""></option>
                                    @foreach($salesMan as $per)
                                        <option manager_id="{{$per->manager_id}}" {{$per->id==$order->sale_id?'selected':''}} value="{{$per->id}}">{{$per->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if($type=='sales' && $useMarket)
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>@lang('front.markter')</label>
                            <select id="marketerSelect" data-placeholder="@lang('front.select')" name="order[markter_id]" class="form-control select2 ">
                                <option value=""></option>
                                @foreach($marktersMan as $per)
                                    <option {{$per->id==$order->markter_id?'selected':''}} value="{{$per->id}}">{{$per->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class="{{($type=='sales')?'col-md-4':'col-md-6'}}">
                        <div class="form-group">
                            <label>@lang('front.invoicenumber')</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa  fa-pencil-square-o"></i>
                                </div>
                                <input readonly required name="order[invoice_number]" value="{{$invoice_number}}" type="text" class="form-control pull-right">

                            </div>
                        </div>
                    </div>
                    <input   name="order[emp_id]" value="{{Auth::user()->id}}" type="hidden" class="form-control pull-right" hidden>

                    <div class="{{($type=='sales')?'col-md-4':'col-md-6'}}">
                        <div class="form-group">
                            <label>@lang('front.status')</label>
                            <select data-placeholder="@lang('front.select')" name="order[status]" class="form-control select2 " style="width:100%;">
                                <option {{$order->status=='delivered'?'selected':''}} value="delivered">@lang('front.delivered')</option>
                                <option {{$order->status=='not-delivered'?'selected':''}} value="not-delivered">@lang('front.not-delivered')</option>
                            </select>
                        </div>
                    </div>
                    <div class="{{($type=='sales')?'col-md-4':'hide'}}">
                        <div class="form-group">
                            <label>@lang('front.type')</label>
                            <select id="priceType"  name="order[priceType]" class="form-control">
                                <option value="one">@lang('front.Sector price') </option>
                                <option value="half">@lang('front.Half wholesale')</option>
                                <option value="multi">@lang('front.Wholesale price')  </option>
                                <option value="gomla_gomla_price">@lang('front.gomlaprice')  </option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div id="invoiceProductList">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">@lang('front.store')</label>
                            <select id="productStores" class="form-control storeList" required="required">
                                @if (Auth::user()->role==1)
                                    @foreach(\App\Store::get() as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                @endif
                                @if (Auth::user()->role==2)
                                    @foreach(\App\Store::where('id',Auth::user()->treasury_id)->get() as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="{{$settings['show_category_in_invoice']==1?'col-md-2':'hide'}}">
                        <div class="form-group">
                            <label>@lang('front.parent')</label>
                            <select id="category_id" class="form-control select2" style="width: 100%;">
                                <option value="">@lang('front.all')</option>
                                @foreach(\App\Category::where('type',1)->get() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="{{($useMarket || $settings['show_category_in_invoice']==1)?'col-md-4':'col-md-5'}}">
                        <div class="form-group">
                            <label for="">@lang('front.product')</label>
                            <div class="input-group">
                                <input name="search_input" autocomplete="off" class="typeahead form-control selectProduct" type="text">
                                <input type="hidden" value="" id="productID">
                                <input type="hidden" value="" id="productName">
                                @if($type=="sales")
                                    @if($settings['use_bounse']==1)
                                        <span class="input-group-addon">
                                            <button type="button" data-toggle="modal" data-target="#modal-dicounts-bounse">
                                               <i class="fa fa-tags"></i>
                                            </button>
                                        </span>
                                    @endif
                                    <span class="input-group-addon btn hide">
                                        <input id="is_new" type="checkbox" class="minimal-red">
                                    </span>
                                @else
                                    <span class="input-group-addon btn hide">
                                        <input id="is_new" type="checkbox" class="minimal-red">
                                    </span>
                                    <span style="padding: 0 5px;" class="input-group-addon">
                                        {{--<input id="is_new" type="checkbox" class="minimal-red">
                                        {{trans('front.new')}}--}}
                                        <a href="{{route('products.create',['req'=>'ajax'])}}" class="addNewItem external" data-toggle="modal" data-target="#addPersonModal">
                                            <i class="fa fa-2x fa-plus-circle"></i>
                                        </a>
                                    </span>
                                @endif
                                <i class="fa fa-circle-o-notch fa-spin loader hide"></i>

                                <span style="width: 100px;" class="unit input-group-addon">
                                    <select id="unitList" class="form-control unitList" required>
                                        @foreach(\App\Unit::latest()->get() as $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">@lang('front.saleprice')</label>
                            <div class="input-group">
                                @php
                                    $isreadOnly = "";
                                    if($settings['canChangePrice']==2 && $type=='sales'){
                                        if(auth()->user()->roles()->first()->id!=1){
                                            $isreadOnly = "readonly";
                                        }
                                    }
                                @endphp
                                <input {{$isreadOnly}} id="unitPrice" autocomplete="off" class="form-control" type="text">
                                    <input id="unitCost" type="hidden">
                                <span style="color: #ffffff;" id="CostPriceSpan" class="input-group-addon btn btn-info {{$settings['show_cost_price']==2?'hide':''}}">
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="{{$settings['show_category_in_invoice']==1?'col-md-2':'col-md-3'}}">
                        <div class="form-group">

                            <label>@lang('front.quantity')</label>
                            <div class="input-group">

                                <input style=" min-width: 120px; " id="productQty" value="1" min="0" step="0.01" type="number" type="text" class="form-control qty" >
                                <span style="color:#ffffff;" id="unitQty" class="input-group-addon btn">
                                    0
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-12 col-md-11">
                        <div class="form-group">
                            <label class="control-label">??????????????</label>
                            <input type="text" style="width: 100% !important" class="form-control serial ">
                        </div>
                    </div> --}}
                    <div class="col-12">
                        <div class="form-group">
                            <label>??????????????</label>
                            <select class="form-control serial select2" multiple>

                            </select>
                        </div>
                    </div>
            </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('front.payment')</label>
                            <select id="paymentMethod" data-placeholder="@lang('front.select')" name="order[payment_type]" class="form-control select2 " style="width:100%;">

                               {{-- <option {{$order->payment_type=='cash'||(empty($order->payment_type) && $settings['default_payment']=='cash')?'selected':''}}  value="cash">@lang('front.Postpaid')</option>--}}
                                <option {{$order->payment_type=='cash'||$order->getOriginal('due')>0||(empty($order->payment_type) && $settings['default_payment']=='cash')?'selected':''}}  value="cash">@lang('front.cash')</option>

                                <option {{$order->payment_type=='delayed'||$order->getOriginal('due')>0||(empty($order->payment_type) && $settings['default_payment']=='delayed')?'selected':''}}  value="delayed">@lang('front.Postpaid')</option>

                                <option {{$order->payment_type=='visa'||(empty($order->payment_type) && $settings['default_payment']=='visa')?'selected':''}}  value="visa">@lang('front.visa')</option>

                                <option {{$order->payment_type=='link transfer'||(empty($order->payment_type) && $settings['default_payment']=='link transfer')?'selected':''}}  value="link transfer">@lang('front.link transfer')</option>
                                {{--@foreach(\App\Bank::get() as $bank)
                                    <option balance="{{$bank->balance}}" {{$order->payment_type==$bank->name||empty($order->payment_type)?'selected':''}}  value="{{$bank->id}}">?????? ????????{{" ( $bank->name ) "}}</option>
                                @endforeach--}}
                            </select>
                        </div>
                    </div>
                    <div id="visaAuthCode" class="col-md-12 hide">
                        <div class="form-group">
                            <label>@lang('front.Auth Code')</label>
                            <input name="order[auth_code]" value="" class="form-control">
                        </div>
                    </div>
            <div class="col-md-12" id="markterratio">

            </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-primary">
                            <th>#</th>
                            <th>@lang('front.store')</th>
                            <th class="col-md-4">@lang('front.product')</th>
                            <th>@lang('front.quantity')</th>
                            <th>@lang('front.saleprice')</th>
                            {{--<th>??????????????</th>--}}
                            <th>@lang('front.unit')</th>
                            {{-- <th>??????????????</th> --}}
                            @if($settings['use_bounse']==1)
                            <th class="col-md-2">@lang('front.bounse')</th>
                            @endif
                            <th>@lang('front.total')</th>
                            @if($type=='sales' && $useMarket)
                                <th>@lang('front.commission')</th>
                            @endif
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="invoiceTable">
                        @foreach($order->details as $item)
                            @php
                                $rowClass = "rowelement".$item->id.'_'.$item->pivot->store_id.'_'.$item->pivot->unit_id;
                            @endphp
                            <tr class="{{$rowClass}} bg-success">
                                <td>
                                    <input type="hidden" class="rowIndex" value="{{$loop->iteration}}">
                                    <input type="hidden" name="product[{{$loop->iteration}}][store_name]" value="{{$item->pivot->store_name}}">
                                    <input type="hidden" name="product[{{$loop->iteration}}][is_service]" value="{{$item->pivot->is_service}}">

                                    <input type="hidden" class="rowUnit_name" name="product[{{$loop->iteration}}][unit_name]" value="{{$item->pivot->unit_name}}">
                                    <input type="hidden" name="product[{{$loop->iteration}}][product_name]" value="{{$item->name}}">
                                    <input class="itemCost" type="hidden" name="product[{{$loop->iteration}}][cost]" value="{{$item->pivot->cost}}">
                                    {{$loop->iteration}}
                                </td>
                                <td><input type="hidden" name="product[{{$loop->iteration}}][store_id]" value="{{$item->pivot->store_id}}">{{$item->pivot->store_name}}</td>
                                <td><input type="hidden" name="product[{{$loop->iteration}}][product_id]" value="{{$item->id}}">{{$item->name}}</td>
                                <td><input class="itemQty tdinput" type="text" name="product[{{$loop->iteration}}][qty]" value="{{$item->pivot->qty-$item->pivot->return_qty}}"></td>
                                <td><input class="itemPrice tdinput" type="text" name="product[{{$loop->iteration}}][price]" value="{{$item->pivot->price}}"></td>
                                {{--<td>
                                    {{($item->pivot->price-$item->pivot->cost)*$item->pivot->qty}}
                                </td>--}}
                                <td><input type="hidden" name="product[{{$loop->iteration}}][unit_id]" value="{{$item->pivot->unit_id}}">{{$item->pivot->unit_name}}</td>


                                @if($settings['use_bounse']==1)
                                <td>
                                    <input type="hidden" name="product[{{$loop->iteration}}][bounse]" value="{{$item->pivot->bounse}}">
                                    <input type="hidden" name="product[{{$loop->iteration}}][bounse_unit_id]" value="{{$item->pivot->bounse_unit_id}}">
                                    <input type="hidden" name="product[{{$loop->iteration}}][bounseUnitText]" value="{{$item->pivot->bounseUnitText}}">
                                    {{$item->pivot->bounse}} {{$item->pivot->bounseUnitText}}
                                </td>
                                @endif
                                <td>
                                    <input class="itemTotal tdinput" readonly type="text" name="product[{{$loop->iteration}}][total]" value="{{$item->pivot->total}}">
                                </td>
                                @if($type=='sales' && $useMarket)
                                <td>
                                    <input type="hidden" name="product[{{$loop->iteration}}][markter]" value="{{$item->pivot->markter}}">
                                    {{$item->pivot->markter}}
                                </td>
                                @endif
                                <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('front.Notes on the invoice')</label>
                            <textarea name="order[note]" class="form-control">{{$order->note}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered pull-right" >
                        <tr>
                            <td style="vertical-align: middle;">@lang('front.total'):-</td>
                            <td>
                                <input readonly id="total" value="{{$order->total or 0}}" name="order[total]" value="0" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">@lang('front.tax'):-</td>
                            <td>
                                <div class="input-group">
                                    <input id="tax" name="order[tax]" value="{{$order->tax or 0}}" class="form-control">
                                    <span class="input-group-addon btn">
                                                    %
                                            </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">@lang('front.discount'):-
                                <span class="input-group-addon ">
                                                <input id="discount_type" value="1" name="order[discount_type]" @if($order->discount_type==2) checked @endif type="checkbox" class="flat-red ">
                                    %
                                    </span></td>
                            <td>
                                <div class="input-group">
                                    <input type="number" step="0.01" required id="discount" name="order[discount]" value="{{$order->discount ?? 0}}" class="form-control">
                                    <input type="hidden" name="order[discount_value]" value="{{$order->discount_value??0}}">
                                    <span style="color:#ffffff;" id="disValue" class="input-group-addon btn ">

                                            </span>
                                </div>
                            </td>
                        </tr>
                        @if($type=='sales' && $settings['point_value'])
                            <tr>
                                <td>@lang('front.point')</td>
                                <td>
                                    <input  name="order[use_point]" @if($order->use_point==1) checked @endif type="checkbox" class="flat-red use_pointInput">
                                    <span class="userpointSpan hide">0</span>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td style="vertical-align: middle;">@lang('front.paid'):-</td>
                            <td>
                                <input type="number" step="0.01" required id="paid" name="order[paid]" value="{{$order->paid ?? 0}}" class="form-control"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">@lang('front.due'):-</td>
                            <td>
                                <div class="input-group">
                                    <input readonly required id="due" name="order[due]" value="{{$order->due ?? 0}}" class="form-control"/>
                                    <span class="input-group-addon">

                                    <button class="{{count($order->calander)?'bg-yellow':''}}" type="button" data-toggle="modal" data-target="#modal-calander">
                                       <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                                </div>
                            </td>
                        </tr>

                        @if(!$order->id)
                        <tr>
                            <td style="vertical-align: middle;">@lang('front.Last payment'):-</td>
                            <td id="last_transaction" class="bg-yellow">
                            </td>
                        </tr>
                        @endif
                        @if($type=='sales')
                        <tr>
                            <td>@lang('front.Withdrawals')</td>
                            <td><input class="flat-red" name="is_withdrawable" type="checkbox" @if(request()->has('withdraw')||$order->is_withdrawable) checked @endif></td>
                        </tr>
                        @endif
                    </table>
                </div>
        </div>
    <div class="modal  fade" id="modal-calander" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">??????????????</h4>
                </div>
                <div class="modal-body calanderList">
                    <div class="row">
                        <div class="col-md-12" style="text-align: left">
                            <input id="QestNumInput" type="number" name="count" value="" placeholder="???????? ?????? ??????????????">
                            <a id="totalQest" style=" margin: 5px 22px; " class="btn btn-sm bg-warning">???????????? ??????????: 0</a>
                            <a id="QestCount"  class="btn btn-sm bg-warning">?????? ?????????????? : 0</a>
                            <a style=" margin: 15px 12px; " class="btn btn-sm bg-green addCalander paymentdueClander" href="#"><i class="fa fa-plus-square"></i></a>
                        </div>
                    </div>
                    @if($order->calander)
                        @foreach($order->calander as $calander)
                            <div class="row itemCalnader">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>??????????????</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input name="duepayment[date][]" type="text" value="{{$calander->date}}" class="form-control pull-right datepicker">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>????????????</label>
                                        <input name="duepayment[value][]" type="number" value="{{$calander->value}}" class="form-control pull-right">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <a class="btn btn-sm bg-red removeCalander paymentdueClander" href="#"><i class="fa fa-minus-square"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary save-calander pull-left">??????</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
        <!-- /.box-body -->
    <div class="box-footer" style="position: absolute;top: -55px;background: none;{{(\Session::get ('locale') == 'ar')?'left: 15px;':'right:15px;'}}">
            @if(auth()->user()->can('profit HomeController') && ($settings['show_profit_button'] ==1 || auth()->user()->roles()->first()->id==1))
                <a data-toggle="modal"  href="#" class="{{$type=='sales'?'':'hide'}} btn btn-warning profit"><i class="fa fa-chart"></i> @lang('front.profit')</a>
            @endif
            <a id="salesDept" class="btn btn-info hide" href="#"></a>
            <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i> @lang('front.save') </button>
            <button type="submit" class="btn btn-success saveandPrint"><i class="fa fa-print"></i> @lang('front.save and print') </button>
            @if($type!='sales')
            <button type="submit" class="btn btn-primary saveandPrintBarcode"><i class="fa fa-barcode"></i> ?????? ???????????? ???????????? </button>
            @endif
        </div>
    </div>

</section>
@if(!isset($notModal))
@include('orders.js')
@endif
<style>
    input.tdinput {
        display: block;
        width: 100%;
        height: 28px;
        padding: 0;
        font-size: 14px;
        line-height: 1.42857143;11111
        color: #555;
        background-color: #dff0d8;
        border: 0px solid #fff;
        border-radius: 4px;
        border: 0px solid #fff!important;
        text-align: center;
    }
</style>
