@extends('layouts.layouts')
@section('title')
    تواصل معنا
@endsection

@section('content')
<style>
    form{
      margin-top: 35px;
      background: #fff;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 15px 15px #ddd;
    }
    label{
      font-size: 15px;
    }
    .container.my-5 input{
      margin-bottom: 10px;
    }
</style>
  <div class="container my-5">
    <div class="row">
      <form  >

          <div class="form-group">
            <label >الاسم</label>
            <input name="name" required  type="text" class="form-control">
          </div>
          <div class="form-group">
            <label >البريد الالكتروني</label>
            <input name="email" required   type="email" class="form-control" >
          </div>
          <div class="form-group">
            <label >رقم الهاتف</label>
            <input name="phone" required   type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label >العنوان</label>
            <input name="address" required   type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label >الرساله</label>
            <textarea name="message" style="resize: none;" required   class="form-control" cols="30" rows="10"></textarea>
          </div>
          <button type="submit" class="btn btn-primary mt-3 w-100" >ارسال الرساله</button>
      </form>
    </div>
  </div>

@endsection
