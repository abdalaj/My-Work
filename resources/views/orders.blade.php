@extends('layouts.app')
@section('title')
Orders
@endsection
@section('content')

<div class="mdl-grid ui-tables">

    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <button  class="generate-excel-basic mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" style="width: auto;margin-bottom:20px;">
            Download Order's As Excel
            <i class="material-icons">
                file_download
            </i>
        </button>
        <div class="mdl-card mdl-shadow--2dp table-order HTMLtoPDF" style="height: auto !important">

            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">All Order To Day</h1>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                <table id="basic_table" class="mdl-data-table mdl-js-data-table bordered-table">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">رقم الاوردر</th>
                            <th class="mdl-data-table__cell--non-numeric">اسم صاحب الاوردر </th>
                            <th class="mdl-data-table__cell--non-numeric">الكميه المطلوبه</th>
                            <th class="mdl-data-table__cell--non-numeric">رقم هاتف الاوردر</th>
                            <th class="mdl-data-table__cell--non-numeric">المحافظه الصادر منها الاوردر</th>
                            <th class="mdl-data-table__cell--non-numeric">العنوان بالتفصيل</th>
                            <th class="mdl-data-table__cell--non-numeric">وصف الاوردر المطلوب</th>
                            <th class="mdl-data-table__cell--non-numeric">تفاصيل اكتر الاوردر المطلوب</th>
                            <th class="mdl-data-table__cell--non-numeric">السعر للاوردر الواحد</th>
                            <th class="mdl-data-table__cell--non-numeric">تاريخ الاوردر</th>
                            <th class="mdl-data-table__cell--non-numeric">طباعة الفاتورة</th>
                            @if (Auth::user()->gender == 'admin')
                                <th class="mdl-data-table__cell--non-numeric delete">حذف الاوردر</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($data as $item)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['id'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['name'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['many'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['phone'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['city'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['carya'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['describ'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['details'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['price'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['created_at'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric edit">
                                    <a href="/printPills/{{$item['id']}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" data-upgraded=",MaterialButton,MaterialRipple">
                                        <i class="material-icons">print</i>
                                        Print
                                        <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
                                    </a>
                                </td>
                                @if (Auth::user()->gender == 'admin')
                                    <td class="mdl-data-table__cell--non-numeric delete">
                                        <form action="{{ route('orders.destroy',$item['id']) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" data-upgraded=",MaterialButton,MaterialRipple">
                                                <i class="material-icons">delete</i>
                                                Delete
                                                <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(39px, 21px);"></span></span>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

