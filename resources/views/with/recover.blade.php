@extends('layouts.layouts')
@section('title')

@endsection
@section('content')
<style>
    .container{
      background: #fff;
      margin-top: 25px !important;
    }
    li{
      margin-bottom: 25px;
      font-size: 18px;
    }

  </style>
  <div class="container pb-4 px-3">
    <div class="row">
      <div  style="text-align: center !important;margin: 25px;font-size: 32px;padding: 20px 10px;font-weight: bold;">
        الاسترجاع مع فاستر
      </div>
      <ul style="padding:0 50px">
          @foreach ($data as $item)
            <li >
                {{ $item->recover }}
            </li>
          @endforeach
      </ul>
    </div>
  </div>

@endsection
