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
                @foreach ($data as $item)
                <form class="form form--basic" action="{{ route('users.update',$item['id']) }}" method="POST" >
                    @foreach ($errors->all() as $x)
                    <div class="color--red " style="text-align: right;padding-right:10px;">{{ $x }}</div>
                    @endforeach
                    @csrf
                    @method('PUT')
                   <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >Name Of users</label>
                            <input  class="mdl-textfield__input" value="{{ $item['name'] }}" name="name" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >Name market Of users</label>
                            <input  class="mdl-textfield__input" value="{{ $item['name_market'] }}" name="name_market" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >email Of users</label>
                            <input  class="mdl-textfield__input" value="{{ $item['email'] }}" name="email" type="email" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >password Of users</label>
                            <input  class="mdl-textfield__input" value="{{ $item['remind'] }}" name="remind" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >password Of users</label>
                            <input  class="mdl-textfield__input" value="{{ $item['remind'] }}" name="password" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >ip Of users</label>
                            <input  class="mdl-textfield__input" value="{{ $item['ip'] }}" name="ip" type="text" >
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >address Of users</label>
                            <input  class="mdl-textfield__input" value="{{ $item['address'] }}" name="address" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:10px" >NationalId Of users</label>
                            <input  class="mdl-textfield__input" value="{{ $item['NationalId'] }}" name="NationalId" type="text" >
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <label style="margin-bottom:15px" >Phone Of users</label> ( رقم الهاتف )
                            <input class="mdl-textfield__input" value="{{ $item['phone'] }}" name="phone">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <select class="mdl-textfield__input" style="color: white" name="active" id="active">
                                <option style="color: black !important"  value="" selected>اختر حالة تفعيل الحساب</option>
                                <option style="color: black !important"  value="1">مفعل</option>
                                <option style="color: black !important"  value="0">غير مفعل</option>
                            </select>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <select class="mdl-textfield__input" style="color: white" name="gender" id="gender">
                                <option style="color: black !important" value="">اختر نوع الصلاحيات</option>
                                <option style="color: black !important" value="admin">admin</option>
                                <option style="color: black !important" value="user">user</option>
                            </select>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <select  id="type" type="text" style="color: white" class="mdl-textfield__input" name="type">
                                <option style="color: black !important" value="" selected >اختر نوع تجارتك</option>
                                <option style="color: black !important"  value="الكل">الكل</option>
                                <option style="color: black !important" value="ملابس">ملابس</option>
                                <option style="color: black !important" value="احذيه">احذيه</option>
                                <option style="color: black !important" value="الكترونيات">الكترونيات</option>
                                <option style="color: black !important" value="كمبيوترات">كمبيوترات</option>
                                <option style="color: black !important" value="موبايلات">موبايلات</option>
                                <option style="color: black !important" value="طعام وسوبر ماركت">طعام وسوبر ماركت</option>
                                <option style="color: black !important" value="العاب">العاب</option>
                                <option style="color: black !important" value="كتب">كتب</option>
                                <option style="color: black !important" value="اكسسورات">اكسسورات</option>
                                <option style="color: black !important" value="مستحضرات تجميل وعطور">مستحضرات تجميل وعطور</option>
                            </select>
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
