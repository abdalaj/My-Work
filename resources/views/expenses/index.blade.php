@extends('layouts.app')
@section('title')
    المصروفات
@endsection
@section('header-name')
    المصروفات
@endsection
@section('header-link')
    <a href="">المصروفات</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">

                @if (count($roles->where('roles_id', 18)) > 0)
                    @if ($roles->where('roles_id', 18)->first()->roles_id == 18)
                        <div class="card-header">
                            <a href="{{ route('expenses.create') }}" class="btn bg-success" style="color: white">
                                <i class="fas fa-plus"></i> اضافه
                            </a>
                        </div>
                    @endif
                @endif
                <div class="p-4">
                    <script>
                        $(function() {
                            $(".font").change(function() {
                                var font = $(".font option:selected").val();
                                sessionStorage.setItem("font-expences", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-expences') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-expences') + "px");

                        })
                    </script>

                    حجم الخط
                    <select class="font" style="width: 100%">
                        @for ($i = 0; $i <= 100; $i += 2)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @endfor
                    </select>
                    <div class="card-body " style="width: 100% !important;">
                        <style>
                            table,
                            th,
                            td {
                                border: 1px solid #000 !important
                            }

                        </style>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th># </th>
                                        <th>البيان </th>
                                        <th>اسم المصروف</th>
                                        <th>نوع المصروف</th>
                                        <th>مبلغ المصروف</th>
                                        <th>اسم الخزينه</th>
                                        <th>التاريخ</th>
                                        @if (count($roles->where('roles_id', 19)) > 0)
                                            @if ($roles->where('roles_id', 19)->first()->roles_id == 19)
                                                <th>تعديل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 20)) > 0)
                                            @if ($roles->where('roles_id', 20)->first()->roles_id == 20)
                                                <th>حذف</th>
                                            @endif
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expences as $ex)
                                        <tr>
                                            <td>
                                                {{ $ex->id }}
                                            </td>
                                            <td>
                                                {{ $ex->name }}
                                            </td>
                                            <td>
                                                {{ $prushes->find($ex->prushes_id)->name }}
                                            </td>
                                            <td>
                                                @if ($ex->prushes_type == 0)
                                                    مصروف عام
                                                @else
                                                    {{ $shorka->find($ex->prushes_type)->name }}
                                                @endif

                                            </td>
                                            <td>
                                                {{ $ex->mony }}
                                            </td>
                                            <td>
                                                {{ $bank->find($ex->bank_id)->name }}
                                            </td>
                                            <td>
                                                {{ $ex->date }}
                                            </td>

                                            @if (count($roles->where('roles_id', 19)) > 0)
                                                @if ($roles->where('roles_id', 19)->first()->roles_id == 19)
                                                    <td>
                                                        <a title="تعديل" href="{{ route('expenses.edit', $ex->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif

                                            @if (count($roles->where('roles_id', 20)) > 0)
                                                @if ($roles->where('roles_id', 20)->first()->roles_id == 20)
                                                    <td>
                                                        <form action="{{ route('expenses.destroy', $ex->id) }}"
                                                            method="POST">
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
    </div>
@endsection
