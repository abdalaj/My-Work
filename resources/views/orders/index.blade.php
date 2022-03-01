@extends('layouts.app')
@section('title')
    الفواتير
@endsection
@section('header-name')
    الفواتير
@endsection
@section('header-link')
    <a href="{{ route('orders.index') }}">الفواتير</a>
@endsection

@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">

                <div class="p-4">
                    <script>
                        $(function() {
                            $(".font").change(function() {
                                var font = $(".font option:selected").val();
                                sessionStorage.setItem("font-orders", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-orders') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-orders') + "px");

                        })
                    </script>

                    حجم الخط
                    <select class="font" style="width: 100%">
                        @for ($i = 0; $i <= 100; $i += 2)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @endfor
                    </select>
                    <div class="card-body " style="width:100%;overflow-x: auto">
                        <table id="example" class="display" style="width:100%;overflow-x: auto">
                            <thead>
                                <tr>
                                    <th> رقم الفاتورة </th>
                                    <th>نوع الدفع</th>
                                    <th>نوع الفاتوره</th>
                                    <th>اسم العميل</th>
                                    <th>الاجمالي</th>
                                    <th>العمله</th>
                                    <th>المدفوع</th>
                                    <th>المتبقي</th>
                                    <th>الضريبه</th>
                                    <th>الملاحظات</th>
                                    <th>المضيف</th>
                                    @if (count($roles->where('roles_id', 78)) > 0)
                                        @if ($roles->where('roles_id', 78)->first()->roles_id == 78)
                                            <th>تعديل</th>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 59)) > 0)
                                        @if ($roles->where('roles_id', 59)->first()->roles_id == 59)
                                            <th>تفاصيل</th>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 58)) > 0)
                                        @if ($roles->where('roles_id', 58)->first()->roles_id == 58)
                                            <th>حذف</th>
                                        @endif
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $s)
                                    <tr>
                                        <td>
                                            {{ $s->invoice_number != null ? $s->invoice_number : 'لا يوجد' }}
                                        </td>
                                        <td>
                                            {{ $s->payment_type != null ? $s->payment_type : 'لا يوجد' }}
                                        </td>
                                        <td>
                                            {{ $s->invoice_type != null ? $s->invoice_type : 'لا يوجد' }}
                                        </td>

                                        <td>
                                            @foreach ($client->where('id', $s->client_id) as $c)
                                                @if ($c->id == $s->client_id)
                                                    {{ $c->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $s->total != null ? $s->total : 'لا يوجد' }}
                                        </td>
                                        <td>
                                            {{ $s->currency != null ? $s->currency : 'لا يوجد' }}
                                        </td>
                                        <td>
                                            {{ $s->paid != null ? $s->paid : 'لا يوجد' }}
                                        </td>
                                        <td>
                                            {{ $s->due != null ? $s->due : 'لا يوجد' }}
                                        </td>
                                        <td>
                                            {{ $s->tax != null ? $s->tax : 'لا يوجد' }}
                                        </td>

                                        <td>
                                            {{ $s->note != null ? $s->note : 'لا يوجد' }}
                                        </td>
                                        <td>
                                            {{ $s->whoadd != null ? $s->whoadd : 'لا يوجد' }}
                                        </td>
                                         @if (count($roles->where('roles_id', 78)) > 0)
                                            @if ($roles->where('roles_id', 78)->first()->roles_id == 78)
                                                <td>
                                                    <a title="تعديل" href="{{ route('orders.edit', $s->id) }}"
                                                        class="edit btn btn-primary btn-xs ml-1"
                                                        >
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 59)) > 0)
                                            @if ($roles->where('roles_id', 59)->first()->roles_id == 59)
                                                <td>
                                                    <a title="تفاصيل" href="{{ route('orders.show', $s->id) }}"
                                                        class="details btn btn-warning btn-xs ml-1"
                                                        style="color: white !important">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 58)) > 0)
                                            @if ($roles->where('roles_id', 58)->first()->roles_id == 58)
                                                <td>
                                                    <form action="{{ route('orders.destroy', $s->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title="حذف"
                                                            class="btn btn-danger btn-xs delete">
                                                            <i class="fa fa-trash "></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
