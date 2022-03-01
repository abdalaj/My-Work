@extends('layouts.app')
@section('title')
    Orders
@endsection
@section('content')
    <br>
    <br>


    <div class="mdl-grid ui-tables">
        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h1 class="mdl-card__title-text">All Order Of Me</h1>
                </div>
                <div class="mdl-card__supporting-text no-padding">
                    <table class="mdl-data-table mdl-js-data-table bOrdered-table">
                        <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">Id</th>
                                <th class="mdl-data-table__cell--non-numeric">Name Of Order</th>
                                <th class="mdl-data-table__cell--non-numeric">Start Of Order</th>
                                <th class="mdl-data-table__cell--non-numeric">End Of Order</th>
                                <th class="mdl-data-table__cell--non-numeric">Hours Of Order</th>
                                <th class="mdl-data-table__cell--non-numeric">Price Of Order</th>
                                <th class="mdl-data-table__cell--non-numeric">HourseFully Of Order</th>
                                <th class="mdl-data-table__cell--non-numeric">Foods Of Order</th>
                                <th class="mdl-data-table__cell--non-numeric">Amount Of Order</th>
                                <th class="mdl-data-table__cell--non-numeric">Unique Of Order</th>
                                <th class="mdl-data-table__cell--non-numeric">Date Of Order</th>
                                <th class="mdl-data-table__cell--non-numeric edit">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $item)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric" style="border-right: .5px solid #666;">{{ $item['id'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric" style="border-right: .5px solid #666;">{{ $item['name'] }} - Room {{ $item['room_id'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric" style="border-right: .5px solid #666;">{{ $item['start'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric" style="border-right: .5px solid #666;">{{ $item['end'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric" style="border-right: .5px solid #666;">{{ $item['hours'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric" style="border-right: .5px solid #666;">{{ $item['price'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric" style="border-right: .5px solid #666;">{{ $item['fully'] }}</td>

                                <td class="mdl-data-table__cell--non-numeric" style="border-right: .5px solid #666;">
                                    {{ App\orderfood::where('order_id',$item['id'])->get()->sum('price') }}
                                </td>
                                <td class="mdl-data-table__cell--non-numeric" style="border-right: .5px solid #666;">
                                    {{ (int)App\orderfood::where('order_id',$item['id'])->get()->sum('price') + $item['fully'] }}
                                </td>
                                <td class="mdl-data-table__cell--non-numeric" style="border-right: .5px solid #666;">{{ $item['unique'] }}</td>

                                <td class="mdl-data-table__cell--non-numeric" style="border-right: .5px solid #666;">{{ $item['created_at'] }}</td>

                                    <td class="mdl-data-table__cell--non-numeric edit" >

                                        <form action="{{ route('orders.destroy',$item['id']) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" data-upgraded=",MaterialButton,MaterialRipple" >
                                                <i class="material-icons">delete</i>

                                            </button>
                                        </form>
                                    </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

