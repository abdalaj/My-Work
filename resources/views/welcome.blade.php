@extends('layouts.layouts')
@section('content')
    <section class="swiper">
      <!-- Swiper -->

     <div class="swiper-container " style="height:calc(55vh)">
         <div class="swiper-wrapper">
             <div class="swiper-slide img1"></div>
             <div class="swiper-slide img2"></div>
             <div class="swiper-slide img3"></div>
             <div class="swiper-slide img4"></div>
             <div class="swiper-slide img5"></div>
             <div class="swiper-slide img6"></div>
             <div class="swiper-slide img7"></div>
             <div class="swiper-slide img8"></div>
             <div class="swiper-slide img9"></div>
             <div class="swiper-slide img10"></div>
         </div>
         <!-- Add Arrows -->
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
         <!-- Add Pagination -->
         <div class="swiper-pagination"></div>
     </div>

    </section>
    <marquee scrollamount="10" direction="right" style="height: auto;padding:15px 0;color:white;font-size:18px" class="bg-primary">تاكد جيدا من استلامك ايصال الطلب ومن صحة المنتج اللذي قمت بطلبه ويجب عليك استلام فاتوره من البائع والا لن تتمكن من اعادة الاوردر نهائيا وان لم يكن هناك فاتورة فلا تقلق فكل اليبيانات الخاصه بالبائع والاوردر وطالب المنتج مسجله لدي فاستر ونحن نقول ذلك زيادة للحرص <span>&#128151;</span></marquee>


    <section class="row content my-5" >

     <main class="col-10 container ">
      @foreach ($data as $item)
      <div  class="row justify-content-between">
        <div class="col-lg-12 col-lg-12 col-lg-12 content-bages p-0 my-2"><a href='/accessories'><img  style="width: 100%;height: 100%;" src="https://dash.faster-eg.com/images/imghome/{{$item->img1}}" ></a></div>
        <div class="col-lg-12 col-lg-12 col-lg-12 content-bages p-0 my-2"><a href='/clothes'><img  style="width: 100%;height: 100%;" src="https://dash.faster-eg.com/images/imghome/{{$item->img2 }}"></a></div>
        <div class="col-lg-12 col-lg-12 col-lg-12 content-bages p-0 my-2"><a href='/shoes'><img  style="width: 100%;height: 100%;" src="https://dash.faster-eg.com/images/imghome/{{$item->img3 }}"></a></div>
        <div class="col-lg-12 col-lg-12 col-lg-12 content-bages p-0  my-2"><a href='/electronics'><img style="width: 100%;height: 100%;"src="https://dash.faster-eg.com/images/imghome/{{$item->img4 }}"></a></div>
        <div class="col-lg-12 col-lg-12 col-lg-12 content-bages p-0 my-2"><a href='/computers'><img  style="width: 100%;height: 100%;" src="https://dash.faster-eg.com/images/imghome/{{$item->img5 }}"></a></div>
        <div class="col-lg-12 col-lg-12 col-lg-12 content-bages p-0 my-2"><a href='/toys'><img  style="width: 100%;height: 100%;" src="https://dash.faster-eg.com/images/imghome/{{$item->img6 }}"></a></div>
        <div class="col-lg-12 col-lg-12 col-lg-12 content-bages p-0 my-2"><a href='/beauty'><img  style="width: 100%;height: 100%;" src="https://dash.faster-eg.com/images/imghome/{{$item->img7 }}"></a></div>
        <div class="col-lg-12 col-lg-12 col-lg-12 content-bages p-0 my-2"><a href='/books'><img  style="width: 100%;height: 100%;" src="https://dash.faster-eg.com/images/imghome/{{$item->img8 }}"></a></div>
        <div class="col-lg-12 col-lg-12 col-lg-12 content-bages p-0 my-2"><a href='/foods'><img  style="width: 100%;height: 100%;" src="https://dash.faster-eg.com/images/imghome/{{$item->img9 }}"></a></div>
        <div class="col-lg-12 col-lg-12 col-lg-12 content-bages p-0 my-2"><a href='/mobiles'><img  style="width: 100%;height: 100%;" src="https://dash.faster-eg.com/images/imghome/{{$item->img10 }}"></a></div>
        <div class="col-lg-12 col-lg-12 col-lg-12 content-bages p-0 my-2"><a href='/car'><img  style="width: 100%;height: 100%;" src="https://dash.faster-eg.com/images/imghome/{{$item->img11 }}"></a></div>
      </div>
      @endforeach
     </main>


    </section>

@endsection
