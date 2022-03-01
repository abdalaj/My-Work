@extends('layouts.app')
@section('title')
    Details Of sliderimg
@endsection
@section('content')

<br />
<a style="margin-left:25px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" href="{{ route('sliderimg.index')}}">
    <i class="material-icons">
        arrow_back
    </i>
    Go To sliderimg
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
                            <label style="margin-bottom:15px" >img1</label> ( الصورة الاولي )
                            <input class="mdl-textfield__input" value="{{ $item['img1'] }}" type="text" disabled name="img1">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img2</label> ( الصورة الثانيه )
                            <input class="mdl-textfield__input" value="{{ $item['img2'] }}" type="text" disabled name="img2">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img3 </label> ( الصورة الثالثه )
                            <input class="mdl-textfield__input" value="{{ $item['img3'] }}" type="text" disabled name="img3">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img4 </label> ( الصورة الرابعه )
                            <input class="mdl-textfield__input" value="{{ $item['img4'] }}" type="text" disabled name="img4">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img5</label> ( الصورة الخامسه )
                            <input class="mdl-textfield__input" value="{{ $item['img5'] }}" type="text" disabled name="img5">
                        </div>

                    </div>
                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img6</label> ( الصورة السادسه )
                            <input class="mdl-textfield__input" value="{{ $item['img6'] }}" type="text" disabled name="img6">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img7</label> ( الصورة السابعه )
                            <input class="mdl-textfield__input" value="{{ $item['img7'] }}" type="text" disabled name="img7">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img8</label> ( الصورة الثامنه )
                            <input class="mdl-textfield__input" value="{{ $item['img8'] }}" type="text" disabled name="img8">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img9</label> ( الصورة التاسعه )
                            <input class="mdl-textfield__input" value="{{ $item['img9'] }}" type="text" disabled name="img9">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >img10</label> ( الصورة العاشره )
                            <input class="mdl-textfield__input" value="{{ $item['img10'] }}" type="text" disabled name="img10">
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
