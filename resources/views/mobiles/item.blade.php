@extends('layouts.layouts')
@section('title')
    معلومات اكتر
@endsection
@section('content')

<style>
    *{
        font-family: 'Cairo', sans-serif;
        box-sizing: border-box;
        text-transform:none;
        white-space: normal;
        line-height: 1.5;
      }
</style>
  @foreach ($data as $item)

  <div class="m-auto text-center mt-md-0 mt-lg-4 mt-sm-0 p-3" style="background:#f7f7fa;width: 96%;color:rgb(64, 69, 83);text-align: right; border-radius: 5px;">
    <section class="row  align-items-stretch justify-content-between ">
      <div class="col-lg-3 col-md-6 col-sm-6 mb-5  col-sm- p-0  " >
          <div class="row  align-items-stretch justify-content-between">


            <div class="col-3 "  style="padding-left: 0;">
              <img class="mb-3" src="https://dash.faster-eg.com/images/mobiles/{{ $item->imghome }}" style="width: 100%;" alt="">
              <img class="mb-3" src="https://dash.faster-eg.com/images/mobiles/{{ $item->img1 }}" style="width: 100%;" alt="">
              <img class="" src="https://dash.faster-eg.com/images/mobiles/{{ $item->img2 }}" style="width: 100%;" alt="">
            </div>
            <div class="col-9 zoom" style="padding-right: 0;">
                <img  src="https://dash.faster-eg.com/images/mobiles/{{ $item->imghome }}" style="width: 100%;height: 100%;" alt="">
            </div>
            <div class="col-12 mt-2 " style="display: flex;align-items: stretch; justify-content: space-between; flex-wrap: wrap;" >
                <div style="width: 24%;"><img src="https://dash.faster-eg.com/images/mobiles/{{ $item->img3 }}" style="width: 100%;" alt=""></div>
                <div style="width: 24%;"><img src="https://dash.faster-eg.com/images/mobiles/{{ $item->img4 }}" style="width: 100%;" alt=""></div>
                <div style="width: 24%;"><img src="https://dash.faster-eg.com/images/mobiles/{{ $item->img5 }}" style="width: 100%;" alt=""></div>
                <div style="width: 24%;"><img src="https://dash.faster-eg.com/images/mobiles/{{ $item->img6 }}" style="width: 100%;" alt=""></div>
            </div>

          </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 mb-5 col-sm- py-3 px-4 " style="text-align: right;color: rgb(126, 133, 155);">
          <div class="mb-5">
            <h3>
              {{ $item->name }}
            </h3>
          </div>
          <div class="mb-5">
            <h2 style="color: black;">
              {{ $item->summry }}
            </h2>
          </div>
          <div class="mb-5" >
            <small >
              السعر القديم &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<span style="text-decoration:line-through;color: black;">{{ $item->price }}</span>
            </small>
          </div>
          <div class="mb-5">
            <h5>
              السعر الجديد &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<span style="color: black;">{{ $item->discount }}</span>
            </h5>
          </div>
          <div  class="mb-5">
            <h5>
              الكميه المتاحه &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<span style="color: black;">{{ $item->number }}</span>
            </h5>
          </div>
          <div  class="mb-5">
            <h5>
              الالوان الخاصه بالمنتج &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<span style="color: black;">{{ $item->color }}</span>
            </h5>
          </div>
          <div class="mb-5">
            <h5>
              حجم المنتج &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<span style="color: black;">{{ $item->size }}</span>
            </h5>
          </div>
          <div  >

              <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue w-100" data-upgraded=",MaterialButton,MaterialRipple" data-toggle="modal" data-target="#staticBackdrop">
                <i class="material-icons">assignment_returned</i>
                شراء الان
            <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>

            <div class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">بيانات الطلب</h5>

                  </div>
                  <form action="/order" method="POST">
                    @csrf
                    <div class="modal-body " >

                        <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" name="name" required   class="form-control" id="name"  autocomplete="name">
                        </div>
                        <div class="form-group">
                        <label for="many">الكميه</label>
                        <input type="text" name="many" required   class="form-control" id="many"  autocomplete="many">
                        </div>
                        <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <input type="text" name="phone" required  class="form-control" id="phone" autocomplete="tel">
                        </div>
                        <div class="form-group">
                        <label for="city">المحافظه</label>
                        <select id="city" name="city" required class="form-control">
                            <option  value="القاهرة">القاهرة</option>
                            <option  value="الجيزة" >الجيزة</option>
                            <option  value="الإسكندرية">الإسكندرية</option>
                            <option  value="الفيوم">الفيوم</option>
                            <option  value="أسوان">أسوان</option>
                            <option  value="أسيوط">أسيوط</option>
                            <option  value="البحيرة">البحيرة</option>
                            <option  value="بني سويف">بني سويف</option>
                            <option  value="الدقهلية">الدقهلية</option>
                            <option  value="دمياط">دمياط</option>
                            <option  value="الشرقيه">الشرقيه</option>
                            <option  value="الغربيه">الغربية</option>
                            <option  value="الدقهليه">الدقهليه</option>
                            <option  value="الإسماعيلية">الإسماعيلية</option>
                            <option  value="كفر الشيخ">كفر الشيخ</option>
                            <option  value="مطروح">مطروح</option>
                            <option  value="المنيا">المنيا</option>
                            <option  value="المنوفية">المنوفية</option>
                            <option  value="الوادي الجديد">الوادي الجديد</option>
                            <option  value="شمال سيناء">شمال سيناء</option>
                            <option  value="بورسعيد">بورسعيد</option>
                            <option  value="القليوبية">القليوبية</option>
                            <option  value="قنا">قنا</option>
                            <option  value="البحر الأحمر">البحر الأحمر</option>
                            <option  value="الشرقية">الشرقية</option>
                            <option  value="سوهاج">سوهاج</option>
                            <option  value="جنوب سيناء">جنوب سيناء</option>
                            <option  value="السويس">السويس</option>
                            <option  value="الأقصر">الأقصر</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="carya">القريه او العنوان بالتفصيل</label>
                        <input type="text" name="carya" required   class="form-control" id="carya" autocomplete="address-level1">
                        </div>
                        <div class="form-group">
                        <label for="details"> المساحه وااللون وحالة الدفع</label>
                        <input type="text" name="details" required   class="form-control" id="details" placeholder=" مثال:- 45 احمر قسط ">
                        </div>
                        <input type="hidden" name="user_item_id" value="{{ $item->user_item_id }}">
                        <input type="hidden" name="describ" value="{{ $item->describ }}">
                        <input type="hidden" name="price" value="{{ $item->price }}">

                    </div>
                    <div class="modal-footer "style="text-align:right !important;display: flex;justify-content:space-between;">
                        <input type="submit"  class="btn btn-primary send" style="width: 45%;"  >
                        <button type="button" class="btn btn-secondary " style="width: 45%;" data-dismiss="modal">الغاء</button>
                    </div>
                </form>
                </div>
              </div>
            </div>
          </div>
      </div>


      <div class="col-lg-3 col-md-12 col-sm-12 mb-5 col-sm- " style="border-right:1px solid #ddd ;text-align: right;font-size: 18px;"  >
        <div style="border-bottom: 1px solid #ddd;" class="mb-4 py-2">
          <h5>
           <div class="d-flex align-items-center" >
            <span style="padding: 8px;border-radius: 50%;background: #eee;color: #d80;" class="material-icons">
              store
              </span>
               &nbsp;&nbsp;<span class="label background-color--secondary " style="height:auto;padding:5px">{{ $item->saler }}</span>
           </div>
          </h5>
        </div>
        <div style="border-bottom: 1px solid #ddd;" class="mb-4 py-2">
          <h5>
            <div class="d-flex align-items-center" >
              <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
              <span style="padding: 8px;border-radius: 50%;background: #eee;color: #d80;" class="material-icons">
                visibility
                </span>
               &nbsp;&nbsp;<span class="label label--mini  color--green " style="height:auto;padding:5px">{{ $item->stauts }}</span>
            </div>
          </h5>
        </div>
        <div style="border-bottom: 1px solid #ddd;" class="mb-4 py-2">
          <h5>
            <div class="d-flex align-items-center">
              <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

                <span style="padding: 8px;border-radius: 50%;background: #eee;color: #d80;" class="material-icons">
                  home
                </span>&nbsp;
                <span class="label background-color--primary " style="height:auto;padding:5px">{{ $item->address }}</span>

            </div>
          </h5>
        </div>
        <div style="border-bottom: 1px solid #ddd;" class="mb-4 py-2">
          <h5>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <div class="d-flex align-items-center">
              <span style="padding: 8px;border-radius: 50%;background: #eee;color: #d80;margin-left: 7px;" class="material-icons">
                local_shipping
                </span>&nbsp;&nbsp;
              <span class="label  background-color--mint  " style="height:auto;padding:5px">{{ $item->charge }}</span>
            </div>
          </h5>
        </div>
        <div style="border-bottom: 1px solid #ddd;" class="mb-4 py-2">
          <h5>
            <div class="d-flex align-items-center">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <span style="padding: 8px;border-radius: 50%;background: #eee;color: #d80;margin-left: 7px;" class="material-icons">
              verified_user
            </span>&nbsp;
                <span class="label label--mini color--light-blue" style="height: auto;padding: 7px; font-size: 16px;">
                  {{ $item->securty }}
                </span>
            </div>
          </h5>
        </div>
        <div style="border-bottom: 1px solid #ddd;" class="mb-4 py-2">
          <h5>
            <div class="d-flex align-items-center">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
              <span style="padding: 8px;border-radius: 50%;background: #eee;color: #d80;margin-left: 7px;" class="material-icons">
                support_agent
              </span>
                <span class="label label--mini color--red" style="height: auto;padding: 7px; font-size: 16px;">
                  اذا واجهتك اي مشكله يرجي التواصل فورا مع خدمة العملاء الخاصه بفاستر عن طريق نظام المراسله الموجود بالاسفل علي الجانب الايمن
                </span>
            </div>
          </h5>
        </div>

      </div>

    </section>

  </div>
  <div class="row m-auto mt-5" style="width: 96%;">
      <div class="col-12">
        <table class="table table-striped table-bordered text-right" style="text-align: right;">
          <thead>
            <tr>
              <th colspan="4" class="table-light" style="text-align: right;padding-right: 25px;" >
                معلومات اكتر عن المنتج
              </th>
            </tr>

          </thead>

          <tbody >
            <tr>
              <td>الوصف</td>
              <td><span class="badge bg-primary" style="line-height: 2;">{{ $item->describ }}</span></td>
            </tr>
            <tr>
              <td>الاسم</td>
              <td><span class="badge bg-primary">{{ $item->name }}</span></td>
            </tr>
            <tr>
              <td>البائع</td>
              <td><span class="badge bg-danger">{{ $item->saler }}</span></td>
            </tr>
            <tr>
              <td>العنوان</td>
              <td><span class="badge bg-info">{{ $item->address }}</span></td>
            </tr>
            <tr>
              <td>الضمان</td>
              <td><span class="badge bg-warning">{{ $item->securty }}</span></td>
            </tr>
            <tr>
              <td>الحاله</td>
              <td><span class="badge bg-success">{{ $item->stauts }}</span></td>
            </tr>
            <tr>
              <td>الكميه المتاحه</td>
              <td><span class="badge background-color--baby-blue">{{ $item->number }}</span></td>
            </tr>
            <tr>
              <td>قبل الخصم</td>
              <td><span class="badge color--smooth-gray">{{ $item->price }}</span></td>
            </tr>
            <tr>
              <td>بعد الخصم</td>
              <td><span class="badge color--purple " >{{ $item->discount }}</span></td>
            </tr>
            <tr>
              <td>الالوان المتاحه</td>
              <td><span class="badge background-color--mint">{{ $item->color }}</span></td>
            </tr>
            <tr>
              <td>حجم المنتج</td>
              <td><span class="badge background-color--cerulean ">{{ $item->size }}</span></td>
            </tr>
            <tr>
              <td>حالة الشحن</td>
              <td><span class="badge color--red">{{ $item->charge }} </span></td>
            </tr>
            <tr>
              <td>امكانية التقسيط</td>
              <td><span class="badge color--dark-gray">{{ $item->installment }} </span></td>
            </tr>
            <tr>
              <td>امكانية الاسترجاع</td>
              <td><span class="badge color--orange">{{ $item->recover }} </span></td>
            </tr>
            <tr>
              <td>رقم البائع</td>
              <td><span class="badge bg-primary" style="line-height: 2;">{{ $item->id }} </span> يستخدم هذا الرقم للابلاغ عن البائع اذا كانت هناك اي مشاكل ما عليك سوي الابلاغ عن العميل بهذا الرقم لتتخذ فاستر الاجراء المناسب له</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>



  @endforeach

@endsection
