@extends('layouts.app')
@section('title')
    Details Of contact
@endsection
@section('content')

<br />
<a style="margin-left:25px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" href="{{ route('contact.index')}}">
    <i class="material-icons">
        arrow_back
    </i>
    Go To contact
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
                            <label style="margin-bottom:15px">Name </label>
                            <input class="mdl-textfield__input" type="text" value="{{ $item['name'] }}"  name="name" disabled>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px">Email </label>
                            <input class="mdl-textfield__input" type="text" value="{{ $item['email'] }}"  name="email" disabled>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px">Phone </label>
                            <input class="mdl-textfield__input" type="text" value="{{ $item['phone'] }}"  name="phone" disabled>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >Address </label>
                            <input class="mdl-textfield__input" type="text" value="{{ $item['address'] }}" name="address" disabled>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px">Message </label>
                            <input class="mdl-textfield__input" type="text" value="{{ $item['message'] }}"  name="message" disabled>
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
