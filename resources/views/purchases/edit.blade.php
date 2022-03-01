@extends('layouts.app')
@section('title')
    تعديل مشتري
@endsection
@section('header-link')
    <a href="{{ route('prushes.create') }}"> تعديل مشتري</a> / المشتريات
@endsection
@section('header-name')
    تعديل مشتري
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل مشتري</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        @foreach ($data as $d)
                            <form action="{{ route('purchases.update',$d->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-6 col-md-4 col-sm-12">
                                        <label class="control-label"> البيان</label>
                                        <input type="text" value="{{ $d->name }}" name="name" class="form-control name" placeholder="اسم البيان">
                                        <input type="hidden" value="{{ $d->order_id }}" name="order_id">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-6 col-md-4 col-sm-12">
                                        <label class="control-label"> الكميه</label>
                                        <input type="text" value="{{ $d->qty }}" name="qty" class="form-control qty" placeholder="الكميه">
                                    </div>

                                    <div class="form-group col-4 col-md-4 col-sm-12">
                                        <label class="control-label"> السعر</label>
                                        <input type="text" value="{{ $d->price }}" name="price" class="form-control price" placeholder="السعر">
                                    </div>
                                    <div class="form-group col-4 col-md-4 col-sm-12">
                                        <label class="control-label"> الاجمالي</label>
                                        <input type="text" value="{{ $d->price*$d->qty }}" name="amount" class="form-control amount" placeholder="الاجمالي">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-6 col-md-4 col-sm-12">
                                        <label class="control-label"> اسم العميل</label>
                                        <select class="form-control select2 name_client" name="client_id">
                                            @foreach ($supplier as $sup)
                                                <option value="{{ $sup->id }}" {{ $sup->id == $d->client_id ?'selected':'' }}>
                                                    {{ $sup->name }} &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span >{{ $sup->type }}</span>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-6 col-md-4 col-sm-12">
                                        <label class="control-label"> التاريخ</label>
                                        <input type="date" value="{{ $d->date }}" name="date" class="form-control date" placeholder="التاريخ">
                                    </div>
                                    <div class="form-group col-12 col-sm-12">
                                        <label class="control-label"> الوصف</label>
                                        <textarea class="form-control describ" name="describe" style="resize:none;width:100% !important">{{ $d->describe }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 " id="add" type="submit">
                                            تسجيل الفاتوره
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
        <script>
            $(function() {
                $(".price").keyup(function() {
                    var price = $(this).val();
                    var qty = $(".qty").val();
                    $(".amount").val(( price * qty).toFixed(2));
                })
                $(".qty").keyup(function() {
                    var price = $(this).val();
                    var qty = $(".price").val();
                    $(".amount").val(( price * qty).toFixed(2));
                })
            })
        </script>
    @endsection
