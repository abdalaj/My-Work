@extends('layouts.app')
@section('title')
    Details Of foods
@endsection
@section('content')

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
                            <label style="margin-bottom:10px" >Name Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['name'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px">Number Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['number'] }}" type="text">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px">Summry Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['summry'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >Price Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['price'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px">Describ Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['describ'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >Saler Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['saler'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >Discount Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['discount'] }}" type="text" >
                        </div>

                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >Size Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['size'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >Installment Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['installment'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >Address Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['address'] }}" type="text">
                        </div>


                    </div>

                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >ImgHome</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['imghome'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img1</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['img1'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img2</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['img2'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img3 </label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['img3'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img4 </label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['img4'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img5</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['img5'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img6</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['img6'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >Stauts Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['stauts'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px">Charge Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['charge'] }}" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >Securty Of foods</label>
                            <input disabled class="mdl-textfield__input" value="{{ $item['securty'] }}" type="text" >
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
