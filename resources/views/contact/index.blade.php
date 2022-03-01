@extends('layouts.app')
@section('title')
    contact
@endsection
@section('content')
@if ( Auth::user()->type =='الكل')
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
                                <th class="mdl-data-table__cell--non-numeric">Name</th>
                                <th class="mdl-data-table__cell--non-numeric">Email</th>
                                <th class="mdl-data-table__cell--non-numeric">Details</th>
                                <th class="mdl-data-table__cell--non-numeric delete">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $item)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['id'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['name'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['email'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <a href="{{ route('contact.show',$item['id']) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" data-upgraded=",MaterialButton,MaterialRipple">
                                        <i class="material-icons">forward</i>
                                        Details
                                        <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(39px, 21px);"></span></span>
                                    </a>
                                </td>
                                <td class="mdl-data-table__cell--non-numeric delete">
                                    <form action="{{ route('contact.destroy',$item['id']) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" data-upgraded=",MaterialButton,MaterialRipple" >
                                            <i class="material-icons">delete</i>
                                            Delete
                                            <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(39px, 21px);"></span></span>
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
    @else
    <style>
        .not{
            position:absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
    </style>
    <div class="not">
        <h1>
            لا يوجد عنوان بهذا الاسم
        </h1>
    </div>
    @endif
@endsection

