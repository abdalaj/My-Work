@extends('layouts.app')
@section('title')
    تعديل فاتورة
@endsection
@section('header-name')
    تعديل فاتورة
@endsection
@section('header-link')
    <a href="">تعديل فاتورة</a>
@endsection

@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header">
                    <h5>تعديل فاتوره</h5>
                </div>
                <div class="p-4">
                    <div class="card-body " style="width:100%;overflow-x: auto">
                        <form action="{{ route('orders.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-4">
                                    <label class="control-label"> نوع الفاتورة</label>
                                    <input type="text" value="{{ $data->invoice_type }}" name="invoice_type" class="form-control "
                                        required placeholder="">
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label"> نوع الدفع</label>
                                    <select class="form-control " required name="payment_type">
                                        <option value="كاش" {{ $data->payment_type ==  'كاش'?'selected':'' }}>
                                            كاش
                                        </option>
                                        <option value="اجل" {{ $data->payment_type ==  'اجل'?'selected':'' }}>
                                            اجل
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label"> الاجمالي</label>
                                    <input type="text" value="{{ $data->total }}" name="total" class="form-control "
                                        required placeholder="">
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label"> المدفوع</label>
                                    <input type="text" value="{{ $data->paid }}" name="paid" class="form-control "
                                        required placeholder="">
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label"> المتبقي</label>
                                    <input type="text" value="{{ $data->due }}" name="due" class="form-control "
                                        required placeholder="">
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label">الضريبه </label>
                                    <input type="text" value="{{ $data->tax }}" name="tax" class="form-control "
                                        required placeholder="">
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label"> الملاحظات</label>
                                    <input type="text" value="{{ $data->note }}" name="note" class="form-control "
                                        required placeholder="">
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label"> رقم الفاتوره</label>
                                    <input type="text" disabled value="{{ $data->invoice_number }}" name="invoice_number"
                                        class="form-control " required placeholder="">
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label">رقم العميل </label>
                                    <input type="text" disabled value="{{ $data->client_id }}" name="client_id" class="form-control "
                                        required placeholder="">
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">
                                        حفظ البيانات
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
