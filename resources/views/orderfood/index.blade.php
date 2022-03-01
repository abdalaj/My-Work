@extends('layouts.app')
@section('title')
Orders Food
@endsection
@section('content')

    <br>
    <br>

    <div class="mdl-grid ui-tables">
        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h1 class="mdl-card__title-text">All Items Of Me</h1>
                </div>
                <div class="mdl-card__supporting-text no-padding">
                    <table class="mdl-data-table mdl-js-data-table bItemsed-table">
                        <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">Id</th>
                                <th class="mdl-data-table__cell--non-numeric">Name</th>
                                <th class="mdl-data-table__cell--non-numeric">Price</th>
                                <th class="mdl-data-table__cell--non-numeric">Qty</th>
                                <th class="mdl-data-table__cell--non-numeric">Amount</th>
                                <th class="mdl-data-table__cell--non-numeric">unique</th>
                                <th class="mdl-data-table__cell--non-numeric">order_id</th>
                                <th class="mdl-data-table__cell--non-numeric edit">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $item)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['id'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['name'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['price'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['qty'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['qty']*$item['price'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['unique'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['order_id'] }}</td>

                                    <td class="mdl-data-table__cell--non-numeric edit" >
                                        {{-- <a href="{{ route('orderfood.edit',$item['id']) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" style="padding: 0 !important" data-upgraded=",MaterialButton,MaterialRipple">
                                            <i class="material-icons">create</i>
                                        </a> --}}
                                        <form action="{{ route('orderfood.destroy',$item['id']) }}" method="POST" style="display: inline-block">
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

