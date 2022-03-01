@extends('layouts.app')
@section('title')
    Details Of users
@endsection
@section('content')

<br />
<a style="margin-left:25px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" href="{{ route('users.index')}}">
    <i class="material-icons">
        arrow_back
    </i>
    Go To users
    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
</a>

<br />
<br />
<div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h5 class="mdl-card__title-text text-color--white">Details Item</h5>
            </div>
            <div class="mdl-card__supporting-text">
                <form class="form form--basic" >
                   @foreach ($data as $item)
                   <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px">Name Of users</label> ( اسم البائع )
                            <input class="mdl-textfield__input" disabled type="text" value="{{ $item['name'] }}"  name="name">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px">Name Market Of users</label> ( اسم محل البائع )
                            <input class="mdl-textfield__input" disabled type="text" value="{{ $item['name_market'] }}"  name="name_market">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >email Of users</label> ( البريد الالكتروني )
                            <input class="mdl-textfield__input" disabled type="text"  value="{{ $item['email'] }}" name="email">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px">Password Of users</label> ( كلمة السر )
                            <input class=
                            "mdl-textfield__input" disabled type="text" value="{{ $item['remind'] }}"  name="remind">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px">Phone Of users</label> ( رقم الهاتف )
                            <input class=
                            "mdl-textfield__input" disabled type="text" value="{{ $item['phone'] }}"  name="phone">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >ip Of users</label>
                            <input class="mdl-textfield__input" disabled type="text" value="{{ $item['ip'] }}" name="ip">
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >Address Of users</label> ( عنوان المحل )
                            <input class="mdl-textfield__input" disabled type="text" value="{{ $item['address'] }}" name="address">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >NationalId Of users</label> ( الرقم القومي )
                            <input class="mdl-textfield__input" disabled type="text" value="{{ $item['NationalId'] }}" name="NationalId">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >Type Of users</label> ( نوع المبيعات )
                            <input class="mdl-textfield__input" disabled type="text" value="{{ $item['type'] }}" name="type">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >Gender Of users</label> ( الصلاحيات )
                            <input class="mdl-textfield__input" disabled type="text" value="{{ $item['gender'] }}" name="gender">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >Activate Of users</label> ( حالة التفعيل )
                            <input class="mdl-textfield__input" disabled type="text" value="{{ $item['active'] }}" name="active">
                        </div>

                    </div>
                </div>
                   @endforeach

                </form>
            </div>
        </div>
    </div>

</div>

@endsection
