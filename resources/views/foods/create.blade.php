@extends('layouts.app')
@section('title')
    Create foods
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
                <h5 class="mdl-card__title-text text-color--white">Create Item</h5>
            </div>
            <div class="mdl-card__supporting-text">
                <form action="{{ route('foods.store')}}" enctype="multipart/form-data" method="POST" class="form form--basic" >
                    @csrf
                    @foreach ($errors->all() as $item)
                    <div class="color--red " style="text-align: right;padding-right:10px;">{{ $item }}</div>
                    @endforeach
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">Name Of foods</label> ( الاسم العام للمنتج )
                                <input class="mdl-textfield__input" type="text" value="{{ Auth::user()->type }}"  name="name">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >Saler Of foods</label> (  اسم محلك )
                                <input class="mdl-textfield__input" type="text" value="{{ Auth::user()->name_market }}" name="saler">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >Address Of foods</label> ( عنوان محلك )
                                <input class="mdl-textfield__input" type="text"  value="{{ Auth::user()->address }}" name="address">
                            </div>

                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >Summry Of foods</label> (  وصف بسيط قوي عن المنتج )
                                <input class="mdl-textfield__input" type="text" name="summry">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px"> Describ Of foods</label> (  كل تفاصل المنتج )
                                <input class="mdl-textfield__input" type="text" name="describ">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >Number Of foods</label> ( الكميه المتاحه عندك في المخزن )
                                <input class="mdl-textfield__input" type="text" name="number">
                            </div>

                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >Price Of foods</label> (  سعر المنتج قبل الخصم )
                                <input class="mdl-textfield__input" type="text" name="price">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >Discount Of foods</label> ( السعر بعد الخصم )
                                <input class="mdl-textfield__input" type="text" name="discount">
                            </div>


                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">Size Of beauty</label> (  وزن المنتج )
                                <input class="mdl-textfield__input" type="text" name="size">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <select type="text" style="color: white" class="mdl-textfield__input" name="stauts">
                                    <option style="color: black !important" value="">اختر حالة المنتج</option>
                                    <option style="color: black !important" value="جديد">جديد</option>
                                    <option style="color: black !important" value="مستعمل">مستعمل</option>
                                    <option style="color: black !important" value="مستورد">مستورد</option>
                                    <option style="color: black !important" value="صنع محلي جديد">صنع محلي جديد</option>
                                    <option style="color: black !important" value="صنع محلي مستعمل">صنع محلي مستعمل </option>
                                </select>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">

                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <select type="text" style="color: white" class="mdl-textfield__input" name="charge">
                                    <option style="color: black !important" value="">اختر حالة الشحن</option>
                                    <option style="color: black !important" value="قابل للشحن لجميع المحافظات">قابل للشحن لجميع المحافظات</option>
                                    <option style="color: black !important" value="قابل للشحن لبعض المحافظات">قابل للشحن لبعض المحافظات</option>
                                    <option style="color: black !important" value="غير قابل للشحن">غير قابل للشحن</option>
                                </select>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <select type="text" style="color: white" class="mdl-textfield__input" name="installment">
                                    <option style="color: black !important" value="">اختر حالة التقسيط</option>
                                    <option style="color: black !important" value="قابل للتقسيط ">قابل للتقسيط</option>
                                    <option style="color: black !important" value="غير قابل للتقسيط">غير قابل للتقسيط</option>
                                </select>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <select type="text" style="color: white" class="mdl-textfield__input"  name="securty">
                                    <option style="color: black !important" value="">اختر حالة الضمان</option>
                                    <option style="color: black !important" value="غير متوفر">غير متوفر</option>
                                    <option style="color: black !important" value="ضمان لمدة 15 يوم">ضمان لمدة 15 يوم</option>
                                    <option style="color: black !important" value="ضمان لمدة شهر">ضمان لمدة شهر</option>
                                    <option style="color: black !important" value="ضمان لمدة شهرين">ضمان لمدة شهرين</option>
                                    <option style="color: black !important" value="ضمان لمدة 3 شهور">ضمان لمدة 3 شهور</option>
                                    <option style="color: black !important" value="ضمان لمدة 4 شهور">ضمان لمدة 4 شهور</option>
                                    <option style="color: black !important" value="ضمان لمدة 5 شهور">ضمان لمدة 5 شهور</option>
                                    <option style="color: black !important" value="ضمان لمدة 6 شهور">ضمان لمدة 6 شهور</option>
                                    <option style="color: black !important" value="ضمان لمدة 7 شهور">ضمان لمدة 7 شهور</option>
                                    <option style="color: black !important" value="ضمان لمدة 8 شهور">ضمان لمدة 8 شهور</option>
                                    <option style="color: black !important" value="ضمان لمدة 9 شهور">ضمان لمدة 9 شهور</option>
                                    <option style="color: black !important" value="ضمان لمدة 10 شهور">ضمان لمدة 10 شهور</option>
                                    <option style="color: black !important" value="ضمان لمدة 11 شهور">ضمان لمدة 11 شهور</option>
                                    <option style="color: black !important" value="ضمان لمدة عام">ضمان لمدة عام</option>
                                    <option style="color: black !important" value="ضمان لمدة عامين">ضمان لمدة عامين</option>
                                    <option style="color: black !important" value="ضمان لمدة 3 اعوام">ضمان لمدة 3 عام</option>
                                    <option style="color: black !important" value="ضمان لمدة 4 اعوام">ضمان لمدة 4 عام</option>
                                    <option style="color: black !important" value="ضمان لمدة 5 اعوام">ضمان لمدة 5 عام</option>
                                    <option style="color: black !important" value="ضمان لمدة 6 اعوام">ضمان لمدة 6 عام</option>
                                    <option style="color: black !important" value="ضمان لمدة 7 اعوام">ضمان لمدة 7 عام</option>
                                    <option style="color: black !important" value="ضمان لمدة 8 اعوام">ضمان لمدة 8 عام</option>
                                    <option style="color: black !important" value="ضمان لمدة 9 اعوام">ضمان لمدة 9 عام</option>
                                    <option style="color: black !important" value="ضمان لمدة 10 اعوام">ضمان لمدة 10 عام</option>
                                    <option style="color: black !important" value="ضمان لمدة 11 اعوام">ضمان لمدة 11 عام</option>
                                    <option style="color: black !important" value="ضمان لمدة 12 اعوام">ضمان لمدة 12 عام</option>
                                    <option style="color: black !important" value="">ضمان مدي الحياه</option>

                                </select>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >ImgHome</label> ( الصورة الرئيسيه )
                                <input class="mdl-textfield__input" type="file" name="imghome">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img1</label> ( الصورة الاولي )
                                <input class="mdl-textfield__input" type="file" name="img1">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img2</label> ( الصورة الثانيه )
                                <input class="mdl-textfield__input" type="file" name="img2">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img3 </label> ( الصورة الثالثه )
                                <input class="mdl-textfield__input" type="file" name="img3">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img4 </label> ( الصورة الرابعه )
                                <input class="mdl-textfield__input" type="file" name="img4">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img5</label> ( الصورة الخامسه )
                                <input class="mdl-textfield__input" type="file" name="img5">
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px" >img6</label> ( الصورة السادسه )
                                <input class="mdl-textfield__input" type="file" name="img6">
                            </div>
                            <input class="mdl-textfield__input" type="hidden" value="{{ Auth::user()->id }}" name="user_item_id">

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
