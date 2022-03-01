{{-- <head>
    <style type="text/css">
        * {
            font-size: {{$settings['PrintSize']}}px !important;
            font-family: 'Times New Roman';
            font-weight: bold;
            text-transform: capitalize;
        }

        .centered {
            text-align: center;
            align-content: center;
        }


        img {
            max-width: inherit;
            width: inherit;
        }

        hr{
            border: 1px solid gray
        }
        @media print {
            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
            .ticket,table{
                max-width: 11cm;
                width: 11cm;
            }
        }

    </style>
</head> --}}

{{-- <div class="ticket" style="text-align: center" dir="ltr">
    @if($settings['logo'])
        <div class="center" style="text-align:center !important">
           <img src="{{ asset('logo') }}/{{ $settings['logo'] }}" alt="Logo"style="height: 130px; width:100%; " class="center">
        </div>
        <h1>
            <center>
                Avliable data
            </center>
        </h1>
    @endif

    <hr>
    <div class="div_2">
        <div class="_1" style="display: flex;justify-content:space-between;text-align: left">

            <div class="01" style="width: 48%">
                invoise &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span style="border-bottom: 1.5px solid gray">
                    # {{ $order->invoice_number }}
                </span>
            </div>
            <div class="02" style="width: 48%">
                {{$order->payment_type=='delayed'?'أجل':'كاش'}}
            </div>
        </div>
        <div class="_2" style="text-align: left">
            casher &nbsp;&nbsp;&nbsp;&nbsp;@php
                if (Auth::user()->role == true) {
                    echo "admin";
                }else {
                    echo "user";
                }
            @endphp <br>
            date &nbsp;&nbsp;&nbsp;&nbsp; {{$order->invoice_date}}<br>
            assitance &nbsp;&nbsp;&nbsp;&nbsp;{{auth()->user()->name}} <br>
        </div>
        <hr>
        <table>
            <thead>
                <tr>
                    <td>Qty</td>
                    <td>X</td>
                    <td>U.P</td>
                    <td>item</td>
                    <td>total</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @php
                        $numqty = 0;
                        $sumprice = 0;
                    @endphp
                    @foreach($order->details as $item)
                        <tr>
                            @php
                                $numqty += $item->pivot->qty;
                                $sumprice += $item->pivot->total;
                            @endphp
                            <td class="quantity">{{$item->pivot->qty}}</td>
                            <td class=""> X </td>
                            <td class="price">
                                {{currency($item->pivot->price,$order->currency, currency()->getUserCurrency(), $format = true)}}
                            </td>
                            <td class="description">{{$item->name}}</td>
                            <td>
                                {{currency($item->pivot->total,$order->currency, currency()->getUserCurrency(), $format = true)}}
                            </td>
                        </tr>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <hr>
        <div class="_3" style="display: flex;justify-content:space-between;align-items:center;text-align:center;width:90%">
            @php
            $numqty = 0;
            $sumprice = 0;
        @endphp
        <div class="03" style="width: 49%;border-right:1px solid #121212">
            @php
            $discount = 0;
            $dist = $order->discount?:0;
            if($order->discount){
                if($order->discount_type==2){
                    $discount=$order->total*($order->discount/100);
                    $dist=$discount;
                    //$dist = "%".$order->discount. " ( $discount )";
                }
            }
            $totalafterDisc = $order->total - $dist;
            @endphp
        Total <br>{{currency($totalafterDisc,$order->currency, currency()->getUserCurrency(), $format = true)}}

        </div>
        <div class="03" style="width: 49%;display:flex;justify-content:space-between;text-align:center">
           <div class="031" style="width: calc(100%2)">
                &nbsp;&nbsp; Discount <br>
                Taxes <br>
           </div>
           <div class="031" style="width: calc(100%2)">
                &nbsp;&nbsp;&nbsp;&nbsp; @php
                $discount = 0;
                $dist = $order->discount?:0;
                if($order->discount){
                    if($order->discount_type==2){
                        $discount=$order->total*($order->discount/100);
                        $dist=$discount;
                        //$dist = "%".$order->discount. " ( $discount )";
                    }
                }
                $totalafterDisc = $order->total - $dist;
            @endphp
            {{currency($dist,$order->currency, currency()->getUserCurrency(), $format = true)}} <br>
            &nbsp;&nbsp;&nbsp;&nbsp;
            @php
            $discount = 0;
            $dist = $order->discount?:0;
            if($order->discount){
                if($order->discount_type==2){
                    $discount=$order->total*($order->discount/100);
                    $dist=$discount;
                    //$dist = "%".$order->discount. " ( $discount )";
                }
            }
            $totalafterDisc = $order->total - $dist;
        @endphp
        {{currency($dist,$order->currency, currency()->getUserCurrency(), $format = true)}} <br>
            </div>

        </div>

        </div>

    </div>
    <hr>
    يسعدنا تواجدكم ونتشرف بزيارتكم مره اخري
    <hr>
    copyright &copy; easy app company 2020  &nbsp;&nbsp;&nbsp;&nbsp; Tel - 01030809007
    <hr>

    {{-- <table class="table table-bordered">
        <tr>
            <td>الفاتورة #</td>
            <td>{{$order->invoice_number}}</td>
        </tr>
        <tr>
            <td>الدفع</td>
            <td>{{$order->payment_type=='delayed'?'أجل':'كاش'}}</td>
        </tr>
        <tr>
            <td>التاريخ</td>
            <td>{{$order->invoice_date}}</td>
        </tr>
        <tr>
            <td>الكاشير</td>
            <td>{{auth()->user()->name}}</td>
        </tr>
        <tr>
            <td>م. المبيعات</td>
            <td>{{optional($order->saleMan)->name}}</td>
        </tr>
        <tr>
            <td>العميل</td>
            <td>{{$order->client->name}}</td>
        </tr>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="quantity">الكمية</th>
                <th class="description">الوصف</th>
                <th class="price">السعر</th>
                <th class="price">إجمالى</th>
            </tr>
        </thead>
        <tbody>
            @php
                $numqty = 0;
                $sumprice = 0;
            @endphp
            @foreach($order->details as $item)
            <tr>
                @php
                    $numqty += $item->pivot->qty;
                    $sumprice += $item->pivot->total;
                @endphp
                <td class="quantity">{{$item->pivot->qty}}</td>
                <td class="description">{{$item->name}}</td>
                <td class="price">
                    {{currency($item->pivot->price,$order->currency, currency()->getUserCurrency(), $format = true)}}
                </td>
                <td>
                    {{currency($item->pivot->total,$order->currency, currency()->getUserCurrency(), $format = true)}}
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td>عدد القطع</td>
                <td>{{$numqty}}</td>
                <td>الإجمالى</td>
                <td>
                    {{currency($sumprice,$order->currency, currency()->getUserCurrency(), $format = true)}}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="table">
                      <!-- <tr>
                           <td>الضريبة</td>
                            <td>{{$order->tax}}%</td>
                        </tr>  -->
                        <tr>
                            <td>الخصم</td>
                            <td>
                                @php
                                    $discount = 0;
                                    $dist = $order->discount?:0;
                                    if($order->discount){
                                        if($order->discount_type==2){
                                            $discount=$order->total*($order->discount/100);
                                            $dist=$discount;
                                            //$dist = "%".$order->discount. " ( $discount )";
                                        }
                                    }
                                    $totalafterDisc = $order->total - $dist;
                                @endphp
                                {{currency($dist,$order->currency, currency()->getUserCurrency(), $format = true)}}
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="2">
                    <table class="table">
                        <tr>
                        <td>الإجمالى</td>
                        </tr>
                        <tr>
                            <td>
                            {{currency($totalafterDisc,$order->currency, currency()->getUserCurrency(), $format = true)}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4">إجمالى المستحقات</td>
            </tr>
            <tr>
                <td colspan="4">
                {{currency($totalafterDisc,$order->currency, currency()->getUserCurrency(), $format = true)}}
                </td>
            </tr>
            @if($order->client->total_due || $order->due)
            <tr>
                <td colspan="4">
                 <!--   <table class="table">
                        <tr>
                            <td colspan="2">كشف حساب مختصر</td>
                        </tr>
                        <tr>
                            <td>المديونية السابقة</td>
                            <td>
                                @php
                                    $total_due = $order->client->total_due;
                                @endphp
                                @if($total_due)
                                {{currency($total_due-$order->due,$order->currency, currency()->getUserCurrency(), $format = true)}}
                                @else
                                0
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>الرصيد</td>
                            <td>{{currency($total_due,$order->currency, currency()->getUserCurrency(), $format = true)}}</td>
                        </tr>
                        @endif
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p>
                       {!! $settings['InvoiceNotes'] !!}
                    </p>
                </td>
            </tr>   -->
            <div class="pull-left">
                {!! $settings['SiteName'] !!}
                <br>
                @if($settings['Address'])
                    {!!$settings['Address']!!}
                @endif
                <br>
                @if($settings['mobile'])
                    {{$settings['mobile']}}
                @endif
            </div>


        </tfoot>
    </table>
</div> --}}

{{-- مصطفي كهربا --}}

<head>
    <style>
        @media print {

        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
        .ticket,table{
            max-width: 9cm;
            width: 9cm;
        }
    }

    </style>
</head>
<center >
    <div dir="rtl" style="width:80%;margin:auto">
        <div class="ticket" style='text-align: right' >
            @if($settings['logo'])
                <div class="center" style="text-align:center !important">
                   <img src="{{ asset('logo') }}/{{ $settings['logo'] }}" alt="Logo"style="height: 160px; width:100%; " class="center">
                </div><br>
                <h1>
                    <center>
                        <h3>
                            للادوات الكهربائيه والنجف والاباليك
                        </h3>
                    </center>
                </h1>
            @endif
            <hr>
                <table>
                   <tbody>
                       <tr>
                           <td>رقم الفاتوره</td>
                           <td># {{ $order->invoice_number }}</td>
                           <td >
                                {{$order->invoice_date}}
                           </td>
                       </tr>
                       <tr>
                            <td>اسم العميل</td>
                            <td>{{$order->client->name}}</td>
                            <td >
                                {{$order->invoice_date}}
                            </td>
                        </tr>
                        <tr>
                            <td>ارقام الهاتف</td>
                            <td>{{$order->client->mobile}}</td>
                            <td >
                                {{$order->client->mobile2}}
                            </td>
                        </tr>
                        <tr>
                            <td>العنوان</td>
                            <td>{{$order->client->address}}</td>
                        </tr>
                   </tbody>
                </table><br>
                <b>
                   <center>
                    شارع ترعة برلنت متفرع من شارع سيد النوبي
                   </center>
                </b>
            <hr>
            كاشير &nbsp;&nbsp;&nbsp;&nbsp; {{ Auth::user()->name }}
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>الصنف</th>
                        <th>الكميه </th>
                        <th>السعر</th>
                        <th>الاجمالي</th>
                    </tr>
                </thead>
                <tbody>
                        @php
                                $numqty = 0;
                                $sumprice = 0;
                            @endphp
                            @foreach($order->details as $item)
                                <tr>
                                    <td class="description">{{$item->name}}</td>
                                    @php
                                    $numqty += $item->pivot->qty;
                                    $sumprice += $item->pivot->total;
                                    @endphp
                                    <td class="quantity">{{$item->pivot->qty}}</td>
                                    <td class="price">
                                        {{currency($item->pivot->price,$order->currency, currency()->getUserCurrency(), $format = true)}}
                                    </td>
                                    <td>
                                        {{currency($item->pivot->total,$order->currency, currency()->getUserCurrency(), $format = true)}}
                                    </td>


                                </tr>
                            @endforeach
                </tbody>
            </table>
            <br>
            <table class="table table-bordered">
                <tfoot>

                    <tr>
                        <td colspan="2">
                            <table class="table">
                               <tr>
                                   <td>الضريبة</td>
                                    <td>{{$order->tax}}%</td>
                                </tr>
                                <tr>
                                    <td>الخصم</td>
                                    <td>
                                        @php
                                            $discount = 0;
                                            $dist = $order->discount?:0;
                                            if($order->discount){
                                                if($order->discount_type==2){
                                                    $discount=$order->total*($order->discount/100);
                                                    $dist=$discount;
                                                }
                                            }
                                            $totalafterDisc = $order->total - $dist;
                                        @endphp
                                        {{currency($dist,$order->currency, currency()->getUserCurrency(), $format = true)}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td colspan="2">
                            <table class="table">
                                <tr>
                                <td>الإجمالى</td>
                                </tr>
                                <tr>
                                    <td>
                                    {{currency($totalafterDisc,$order->currency, currency()->getUserCurrency(), $format = true)}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">إجمالى المستحقات</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                        {{currency($totalafterDisc,$order->currency, currency()->getUserCurrency(), $format = true)}}
                        </td>
                    </tr>
                    @if($order->client->total_due || $order->due)
                    <tr>
                        <td colspan="4">
                           <table class="table">
                                <tr>
                                    <td colspan="2">كشف حساب مختصر</td>
                                </tr>
                                <tr>
                                    <td>المديونية السابقة</td>
                                    <td>
                                        @php
                                            $total_due = $order->client->total_due;
                                        @endphp
                                        @if($total_due)
                                        {{currency($total_due-$order->due,$order->currency, currency()->getUserCurrency(), $format = true)}}
                                        @else
                                        0
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>الرصيد المديون به هذا العميل</td>
                                    <td>{{currency($total_due,$order->currency, currency()->getUserCurrency(), $format = true)}}</td>
                                </tr>
                                @endif
                            </table>
                        </td>
                    </tr>

                </tfoot>
            </table>
            <hr>
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            ملاحظات
                        </td>
                    </tr>
                    <tr>
                        <td>
                            الفاتورة {{$order->payment_type=='delayed'?'أجل':'كاش'}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <center>
                <br>
                المدير المسئول مصطفي  <br><br> 01149402824 - 01001449176
            <hr>
            رقم المحل 24942355
            <hr>
            </center>
            الاسترجاع يتم خلال 14 يوم فقط من تاريخ استلام المنتج ولا تسترد البضاعه ولا تستبدل الا بالفاتورة
            <hr>

            copyright &copy; easy app company 2020  &nbsp;&nbsp;&nbsp;&nbsp; Tel - 01030809007
            <hr>
        </div>
    </div>
</center>

