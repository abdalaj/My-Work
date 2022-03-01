@extends('layouts.app')
@section('content')
@section('title',trans('front.dayReport'))
<section class="content-header">
	<h1>
		@lang('front.report')
		<small>
			@lang('front.dailyreport')
		</small>
		<a class="btn print-window pull-right" href="javascript:void(0)" onclick="window.print()" role="button">
			<i class="fa fa-print" aria-hidden="true"></i>
		</a>
        <a id="printiframe" href="javascript:void(0)" class="btn pull-right"><i class="fa fa-print" aria-hidden="true"></i> Print Receipt</a>
	</h1>
</section>
<section class="content ticket">
	<div class="box box-primary">
		@include('layouts.partial.filter')
		@include('layouts.partial.printHeader')
		<div class="row">
			<div class="col-md-12">
                <iframe style="display: none;" id="dayteportFrame" srcdoc='@include('reciept_day_report')' width="500px" height="400px"></iframe>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">@lang('front.title')</th>
							<th class="text-center">@lang('front.Outcome')</th>
							<th class="text-center">@lang('front.Income')</th>
						</tr>
					</thead>
					<tbody>

                    <tr>
                        <td> المتبقي من مبيعات اليوم الاجله</td>
                        <td></td>
                        <td>
                            <div class="badge bg-fegault">
                                {{currency(round($orders->totalDue??0,2),currency()->config('default'), currency()->getUserCurrency(), $format = true)}}
                            </div>
                        </td>
                    </tr>
					<tr>
						<td> @lang('front.cash sales')</td>
						<td></td>
						<td>
                            <div class="badge bg-green">
                                {{currency(round($orders->totalPaid??0,2),currency()->config('default'), currency()->getUserCurrency(), $format = true)}}
                            </div>
						</td>
					</tr>
                    <tr>
                        <td>@lang('front.clients payments')</td>
                        <td></td>
                        <td>
                            <div class="badge bg-green">
                                {{currency(round($clientPayments??0,2),currency()->config('default'), currency()->getUserCurrency(), $format = true)}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('front.cashdebosit')</td>
                        <td></td>
                        <td>
                            <div class="badge bg-green">
                                {{currency(round($transactions[0]->totalSum??0,2),currency()->config('default'), currency()->getUserCurrency(), $format = true)}}
                            </div>
                        </td>
                    </tr>
					<tr>
						<td>@lang('front.expenses')</td>
						<td>
                            <div class="badge bg-red">
                                {{currency(round($expenses??0,2),currency()->config('default'), currency()->getUserCurrency(), $format = true)}}

                            </div>
                        </td>
						<td></td>
					</tr>
                    <tr>
                        <td> @lang('front.cash withdraw') </td>
                        <td>
                            <div class="badge bg-red">

                                {{currency(round($withdraw??0,2),currency()->config('default'), currency()->getUserCurrency(), $format = true)}}
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> @lang('front.cash purcahses') </td>
                        <td>
                            <div class="badge bg-red">
                                {{currency(round($purchase->grandTotal??0,2),currency()->config('default'), currency()->getUserCurrency(), $format = true)}}
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> @lang('front.suppliers payments') </td>
                        <td>
                            <div class="badge bg-red">
                                {{currency(round($supplierPayments??0,2),currency()->config('default'), currency()->getUserCurrency(), $format = true)}}
                            </div>
                        </td>
                        <td></td>
                    </tr>
					</tbody>
                    <tfoot>
                        <tr class="bg-warning">
                            <td>@lang('front.Cash')</td>
                            <td colspan="2">
                                <div class="badge bg-yellow">
                                    {{currency(round($balance??0,2),currency()->config('default'), currency()->getUserCurrency(), $format = true)}}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
				</table>
			</div>
		</div>
	</div>
</section>
@stop
@push('css')
<style>
	.progress-bar,.badge{
		width: 100%;
	}
	.badge {
		width: 100%;
		padding: 5px;
	}
	table,.badge {
		font-size: 14px !important;
		font-weight: bold !important;
	}
</style>
@if($settings['printerType']!='receipt')
	<style>
	@media print {
		table,.badge {
			font-size: 18px !important;
			color: #0c0c0c!important;
		}

	}
	</style>
	@else

	<style>
        @media print {
			table,.badge {
				color: #0c0c0c!important;
			}
	        .ticket,.table{
	            max-width: 350px !important;
	        }
	        * {
	        font-size: 12px !important;
	        font-family: 'Times New Roman';
		    }
            .printHeader{
                display: block!important;
            }
            a[href]:after {
                content: none !important;display: none !important;
            }
            .main-footer,.dt-buttons,.dataTables_filter{
                display: none ;display: none !important;
            }

            #footer{visibility: visible;display: none !important;}
            a{
                visibility:hidden;display: none !important;
            }
            .table {
                border: 1px solid black !important;
            }
            .table td,.table thead tr th {
                border: 1px solid black !important;
            }
            @media print {
                .printHeader{
                    display: block!important;
                }
                table  {
                    font-size: {{$settings['PrintSize']}}px !important;
                }
                tr    { page-break-inside:avoid; page-break-after:auto }
                td    { page-break-inside:avoid; page-break-after:auto }
                thead { display:table-header-group;page-break-inside: avoid; }
                tfoot { display:table-footer-group }
                @page { margin: .1cm; }
                body { margin: .1cm;}
                .panel-default{
                    border: none;
                }
                .hideprint{
                    visibility:hidden;
                    margin:0;
                    padding: 0;
                    display: none !important;
                }
            }

            html, body {
                height:100vh;
                width: 100vh;
                margin: 0px !important;
                padding-left: 100px !important;
                /*overflow: hidden;*/
            }
        }
        </style>
	@endif
@endpush
@push('js')
	<script>
        $('.datepicker').datepicker({
            autoclose: true,
            rtl: true,
            format: 'yyyy-mm-dd',
            language: "{{\Session::get('locale')}}",
        });
        $(document).on("click","#printiframe",function(){
            $("#dayteportFrame").get(0).contentWindow.print();
        });
	</script>
@endpush
