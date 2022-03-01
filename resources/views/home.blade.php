@extends('layouts.app')
@section('header-name')
    الصفحه الرئيسيه
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('materio/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('materio/css/style.css') }}">
@endsection
@section('header-link')
    <a href="/">الصفحه الرئيسيه</a>
@endsection
@section('content')
    <div class="box-content" style="width: 100% !important">
        <div class="statics" style="margin-bottom: 25px">
            <div class="l-side">
                <div class="one">
                        <div class="rating">
                            <div style="float: left">
                                <h2>مبيعات اليوم</h2>
                                <label>{{ $exporterToDay[0]->exporterToDay == null?0 :$exporterToDay[0]->exporterToDay }}</label>
                            </div>
                            <div style="float: right">
                                <img src="{{ asset('materio/images/9.249c7d38.png') }}">
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                    <div class="two">
                        <div class="sessions">
                            <div style="float: left">
                                <h2>مشتريات اليوم</h2>
                                @php
                                    $importantToDay[0]->importantToDay == null?0 :$importantToDay[0]->importantToDay;
                                    $purchasesToDay[0]->purchasesToDay == null?0 :$purchasesToDay[0]->purchasesToDay;
                                @endphp
                                <label>{{ $purchasesToDay[0]->purchasesToDay + $importantToDay[0]->importantToDay }}

                                </label>
                            </div>
                            <div style="float: right">
                                <img src="{{ asset('materio/images/10.c8088c90.png') }}">
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
            </div>
            <div class="r-side">
            <div class="Statistics-Card">

                <div class="statics">
                    <div class="sales">
                        <div class="icon"><i class="fas fa-balance-scale-left"></i></div>
                        <div class="info">
                            <h4>المصروفات</h4>
                            <span>
                                {{ $expensesToDay[0]->expensesToDay == null?0 :$expensesToDay[0]->expensesToDay }}
                            </span>
                        </div>
                    </div>
                    <div class="customers">
                        <div class="icon"><i class="fas fa-trash"></i></div>
                        <div class="info">
                            <h4>الهالكات</h4>
                            <span>
                                {{ $expireToDay[0]->expireToDay == null?0:$expireToDay[0]->expireToDay }}
                            </span>
                        </div>
                    </div>
                    <div class="product ">
                        <div class="icon "><i class="fas fa-balance-scale-right"></i></div>
                        <div class="info ">
                            <h4>مرتجعات الواردات</h4>
                            <span>{{ $returnToDayToimportant[0]->returnToDayToimportant == null?0:$returnToDayToimportant[0]->returnToDayToimportant }}</span>
                        </div>
                    </div>
                    <div class="product ">
                        <div class="icon bg-success"><i class="fas fa-check"></i></div>
                        <div class="info">
                            <h4>مرتجعات التحميل </h4>
                            <span>{{ $returnToDayToexporter[0]->returnToDayToexporter == null?0:$returnToDayToexporter[0]->returnToDayToexporter }}</span>
                        </div>
                    </div>
                    <div class="product ">
                        <div class="icon bg-primary"><i class="fas fa-fas fa-undo"></i></div>
                        <div class="info">
                            <h4>مرتجعات المشتريات</h4>
                            <span>{{ $returnToDayTopurchases[0]->returnToDayTopurchases == null?0:$returnToDayTopurchases[0]->returnToDayTopurchases }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

