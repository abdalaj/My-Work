@extends('layouts.app')
@section('title')
    foods
@endsection
@section('content')
    <br>
    <br>

    <a  href="{{ route('foods.create') }}" style="margin-left:20px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" data-upgraded=",MaterialButton,MaterialRipple">
        <i class="material-icons">add_circle</i>
        Create New Item
        <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(39px, 21px);"></span></span>
    </a>
    <br />
    <br />
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
                                <th class="mdl-data-table__cell--non-numeric">Name Of Items</th>
                                <th class="mdl-data-table__cell--non-numeric">Price Of Items</th>
                                <th class="mdl-data-table__cell--non-numeric">Qty Of Items</th>
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

                                    <td class="mdl-data-table__cell--non-numeric edit" >
                                        <a href="{{ route('foods.edit',$item['id']) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" style="padding: 0 !important" data-upgraded=",MaterialButton,MaterialRipple">
                                            <i class="material-icons">create</i>
                                        </a>
                                        <form action="{{ route('foods.destroy',$item['id']) }}" method="POST" style="display: inline-block">
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

