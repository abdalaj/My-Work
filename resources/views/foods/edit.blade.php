@extends('layouts.app')
@section('title')
    Edit Of foods
@endsection
@section('content')


<div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
    <br />
    <a style="margin-left:25px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" href="{{ route('foods.index')}}">
        <i class="material-icons">
            arrow_back
        </i>
        Go To foods
        <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
    </a>

    <br />
    <br />
    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp" >

            @foreach ($data as $item)
                <div class="mdl-card__title">
                    <h5 class="mdl-card__title-text text-color--white">Details Food</h5>
                </div>
                    <div class="mdl-card__supporting-text">
                        <form class="form form--basic" action="{{ route('foods.update',$item['id']) }}" method="POST" >
                            @foreach ($errors->all() as $x)
                            <div class="color--red " style="text-align: right;padding-right:10px;">{{ $x }}</div>
                            @endforeach
                            @csrf
                            @method('PUT')
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
                                <div class="mdl-textfield mdl-js-textfield full-size">
                                    <label style="margin-bottom:15px">Name Of foods</label>
                                    <input class="mdl-textfield__input" type="text" value="{{ $item['name'] }}"  name="name">
                                </div>

                                <div class="mdl-textfield mdl-js-textfield full-size">
                                    <label style="margin-bottom:15px" >Price Of foods</label>
                                    <input class="mdl-textfield__input" type="text" value="{{ $item['price'] }}" name="price">
                                </div>

                                <div class="mdl-textfield mdl-js-textfield full-size">
                                    <label style="margin-bottom:15px" >Qty Of foods</label>
                                    <input class="mdl-textfield__input" type="text" value="{{ $item['qty'] }}" name="qty">
                                </div>

                            </div>

                        </div>

                            <button style="width: 100%" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" data-upgraded=",MaterialButton,MaterialRipple" type="submit">
                                <i class="material-icons">add_circle</i>
                                Edit
                                <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
                            </button>
                        </form>

                    </div>

            @endforeach


        </div>
    </div>

</div>

@endsection




