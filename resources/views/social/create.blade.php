@extends('layouts.app')
@section('title')
    Create social
@endsection
@section('content')

<br />
<a style="margin-left:25px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" href="{{ route('social.index')}}">
    <i class="material-icons">
        arrow_back
    </i>
    Go To social
    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
</a>
<br />
<br />

<div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h5 class="mdl-card__title-text text-color--white">Create Item</h5>
            </div>
            <div class="mdl-card__supporting-text">
                <form action="{{ route('social.store')}}" enctype="multipart/form-data" method="POST" class="form form--basic" >
                    @foreach ($errors->all() as $item)
                    <div class="color--red " style="text-align: right;padding-right:10px;">{{ $item }}</div>
                    @endforeach
                    @csrf
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">Facebook</label>
                                <input class="mdl-textfield__input" type="url" value=""  name="facebook">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >Twitter</label>
                                <input class="mdl-textfield__input" type="url" value="" name="twitter">
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">Instagram</label>
                                <input class="mdl-textfield__input" type="url" value=""  name="instagrame">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >Youtube</label>
                                <input class="mdl-textfield__input" type="url" value="" name="youtube">
                            </div>
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
