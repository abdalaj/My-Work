@extends('layouts.app')
@section('title')
    تعديل العمله
@endsection
@section('header-link')
<a href=""> تعديل عمله</a> / العملات
@endsection
@section('header-name')
    تعديل عمله
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">تعديل فاتوره</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">

                <form action="{{ route('currencies.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الاسم</label>
                                <input value="{{$currency->name??''}}" required name="name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الكود</label>
                                <select style="width: 100%;" required class="form-control select2" name="code">
                                    @foreach($currencyCode as $code)
                                        <option {{isset($currency) && $currency->code==$code?'selected':''}} value="{{$code}}">{{$code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الفورمات</label>
                                <input placeholder="ج.م" value="{{$currency->symbol??''}}" required name="symbol" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الفورمات</label>
                                <input placeholder="1,0.00 ج.م" value="{{$currency->format??''}}" required name="format" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>سعر الصرف</label>
                                <input value="{{isset($currency) ?1/$currency->exchange_rate:''}}" required name="exchange_rate" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الحاله</label>
                                <select name="active" class="form-control select2" style="width: 100%;">
                                    <option {{(isset($currency) && $currency->active==1)?'selected':''}} value="1">نشط</option>
                                    <option {{(isset($currency) && $currency->active==0)?'selected':''}}  value="0">غير نشط</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">
                                تعديل
                            </button>
                        </div>
                    </div></form>
                <script>
                    $(function () {
                        $(".select2").select2();
                        $('form').validator();
                    });
                </script>
            </div>
          </div>
    </div>
</div>
@endsection

