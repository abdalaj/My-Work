@extends('layouts.app')
@section('title')
    Devicess
@endsection
@section('content')
    <br />
    <br />
    <a  href="{{ route('devices.create') }}" style="margin-left:20px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" data-upgraded=",MaterialButton,MaterialRipple">
        <i class="material-icons">add_circle</i>
        Create New Devices
        <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(39px, 21px);"></span></span>
    </a>
    <br />
    <br />
    <div class="mdl-grid ui-tables">
        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h1 class="mdl-card__title-text">All Devices Of Me</h1>
                </div>
                <div class="mdl-card__supporting-text no-padding">
                    <table class="mdl-data-table mdl-js-data-table bItemsed-table">
                        <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">Id</th>
                                <th class="mdl-data-table__cell--non-numeric">Name</th>
                                <th class="mdl-data-table__cell--non-numeric">Time</th>
                                <th class="mdl-data-table__cell--non-numeric">Price</th>
                                <th class="mdl-data-table__cell--non-numeric">Photo</th>
                                <th class="mdl-data-table__cell--non-numeric">Active</th>
                                <th class="mdl-data-table__cell--non-numeric">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $item )
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['id'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['name'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['time'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['price'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <img src="images/devices/{{ $item['img'] }}" width="50" height="50" alt="">
                                </td>
                                @if ($item['active']==0)
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <span class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" style="padding: 0 !important">
                                            <i class="material-icons">clear</i>
                                        </span>
                                    </td>
                                @else
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <span class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" style="padding: 0 !important">
                                            <i class="material-icons">check</i>
                                        </span>
                                    </td>
                                @endif
                                    <td class="mdl-data-table__cell--non-numeric edit" >
                                        <a href="{{ route('devices.edit',$item['id']) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" data-upgraded=",MaterialButton,MaterialRipple" style="padding: 0 !important">
                                            <i class="material-icons">create</i>
                                        </a>
                                        <form style="display: inline-block" action="{{ route('devices.destroy',$item['id']) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" style="padding: 0 !important" data-upgraded=",MaterialButton,MaterialRipple" >
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

