@extends('layouts.app')
@section('title')
    Create homeimg
@endsection
@section('content')

<br />
<a style="margin-left:25px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" href="{{ route('homeimg.index')}}">
    <i class="material-icons">
        arrow_back
    </i>
    Go To homeimg
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
                <form action="{{ route('homeimg.store')}}" enctype="multipart/form-data" method="POST" class="form form--basic" >
                    @foreach ($errors->all() as $item)
                    <div class="color--red " style="text-align: right;padding-right:10px;">{{ $item }}</div>
                    @endforeach
                    @csrf
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img1</label> ( الصورة الاولي اكسسورات )
                                <input class="mdl-textfield__input" type="file" name="img1">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img2</label> ( الصورة الثانيه ملابس )
                                <input class="mdl-textfield__input" type="file" name="img2">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img3 </label> ( الصورة الثالثه احذيه )
                                <input class="mdl-textfield__input" type="file" name="img3">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img4 </label> ( الصورة الرابعه الكترونيات )
                                <input class="mdl-textfield__input" type="file" name="img4">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img5</label> ( الصورة الخامسه كمبيوترات )
                                <input class="mdl-textfield__input" type="file" name="img5">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img11</label> ( الصورة الحادية عشر سيارات )
                                <input class="mdl-textfield__input" type="file" name="img11">
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img6</label> ( الصورة السادسه العاب )
                                <input class="mdl-textfield__input" type="file" name="img6">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img7</label> ( الصورة السابعه مستحضرات تجميل )
                                <input class="mdl-textfield__input" type="file" name="img7">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img8</label> ( الصورة الثامنه كتب )
                                <input class="mdl-textfield__input" type="file" name="img8">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img9</label> ( الصورة التاسعه طعام )
                                <input class="mdl-textfield__input" type="file" name="img9">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img10</label> ( الصورة العاشره موبايلات )
                                <input class="mdl-textfield__input" type="file" name="img10">
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
