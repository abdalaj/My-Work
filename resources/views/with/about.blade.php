@extends('layouts.layouts')

@section('title')
اعرف اكتر عننا
@endsection
@section('content')
<style>
    details{
      padding: 20px 15px;
      background: #fff;
      margin: 10px 0px;
      font-size: 22px;
    }
    summary{
      margin: 5px 0;
      padding: 5px 0;
      font-size: 18px;
    }
  </style>
  <div class="container">
    <div class="row">
      <div  style="text-align: center !important;margin: 25px;font-size: 32px;padding: 20px 10px;font-weight: bold;">
        الاسئله الشائعه عن فاستر !
      </div>
      @foreach ($data as $item)
      <details >
        <summary>
          {{ $item->que }}
        </summary>
          {{ $item->ans }}
      </details>
      @endforeach
    </div>
  </div>

@endsection
