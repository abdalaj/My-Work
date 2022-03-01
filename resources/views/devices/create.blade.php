@extends('layouts.app')
@section('title')
    Create Devices
@endsection
@section('content')

<br />
<a style="margin-left:25px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" href="{{ route('devices.index')}}">
    <i class="material-icons">
        arrow_back
    </i>
    Go To Devices
    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
</a>
<br />
<br />

<div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h5 class="mdl-card__title-text text-color--white">Create Devices</h5>
            </div>
            <div class="mdl-card__supporting-text">
                @foreach ($errors->all() as $item)
                <div class="color--red " style="text-align: right;padding-right:10px;">{{ $item }}</div>
                @endforeach
                <form action="{{ route('devices.store')}}" enctype="multipart/form-data" method="POST" class="form form--basic" >
                    @csrf
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">Name Of Devices</label>
                                <input class="mdl-textfield__input" type="text" value=""  name="name">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">time Of Devices</label>
                                <input class="mdl-textfield__input" type="text" value="ساعه"  name="time">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">Price Of Devices</label>
                                <input class="mdl-textfield__input" type="text" value=""  name="price">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">Photo Of Devices</label>
                                <input class="mdl-textfield__input" type="file" value=""  name="img">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <select style="color: white" class="mdl-textfield__input"  name="room_id">
                                    @foreach ($rooms as $room)
                                        <option style="color: black !important" value="{{ $room->id }}">{{ $room->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                <input  type="hidden" value="0"  name="active">
                        </div>
                    </div>

                    <button style="width: 48%" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" data-upgraded=",MaterialButton,MaterialRipple" type="submit">
                        <i class="material-icons">add_circle</i>
                        Add
                        <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
                    </button>
                    <button style="width: 48%" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" data-upgraded=",MaterialButton,MaterialRipple" type="reset">
                        <i class="material-icons">delete</i>
                        Rest
                        <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
