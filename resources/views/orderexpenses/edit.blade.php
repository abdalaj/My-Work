@extends('layouts.app')
@section('title')
    Details Of OrderExpenses
@endsection
@section('content')


<div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
    <br />
    <a style="margin-left:25px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" href="{{ route('orderexpenses.index')}}">
        <i class="material-icons">
            arrow_back
        </i>
        Go To OrderExpenses
        <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
    </a>

    <br />
    <br />
    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp" >


                <div class="mdl-card__title">
                    <h5 class="mdl-card__title-text text-color--white">Details OrderExpenses</h5>
                </div>
                    <div class="mdl-card__supporting-text">
                        @foreach ($data as $item)

                        <form class="form form--basic" action="{{ route('orderexpenses.update',$item['id']) }}" method="POST" >
                            @foreach ($errors->all() as $x)
                            <div class="color--red " style="text-align: right;padding-right:10px;">{{ $x }}</div>
                            @endforeach
                            @csrf
                            @method('PUT')
                        <div class="mdl-grid">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <select style="color: white" class="mdl-textfield__input"  name="name">
                                    @foreach ($ex as $exp)
                                        <option style="color: black !important" value="{{ $exp->name }}">{{ $exp->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
                                    <div class="mdl-textfield mdl-js-textfield full-size">
                                        <label style="margin-bottom:15px">Price Of OrderExpenses</label>
                                        <input class="mdl-textfield__input" type="text" value="{{ $item['price'] }}"  name="price">
                                    </div>
                                </div>

                        </div>
                            <button style="width: 100%" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" data-upgraded=",MaterialButton,MaterialRipple" type="submit">
                                <i class="material-icons">add_circle</i>
                                Edit
                                <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
                            </button>
                        </form>
                        @endforeach

                    </div>


        </div>
    </div>

</div>

@endsection




