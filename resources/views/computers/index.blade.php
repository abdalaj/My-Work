@extends('layouts.layouts')
@section('title')
    كمبيوتر ولابتوب
@endsection
@section('css')
<style>

    body{
      background-color: rgba(200, 200, 200, .1);
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
    }

    .flex{
      display: flex;
    }
    .card{
      border: none;
      height: auto;
    }
    .card img{
      border-top-right-radius: .25rem;
      border-top-left-radius: .25rem;
    }
    @media(max-width:576px){
      .container{
        width: 90%;
        margin:auto ;
      }
      .card{
        border: none;
        width: 49%;
      }
    }
    @media(max-width:320px){
      .container{
        width: 90%;
        margin:auto ;
      }
      .card{
        border: none;
        width: 100%;
      }
    }
    a{
      text-decoration: none;
      color: #242f3f;
      font-weight: normal;
    }
  </style>
@endsection
@section('content')
    <div class="container">
        <div  class="row align-items-stretch justify-content-between mt-2 ">

            <div class="col-12">
              <input type="text" placeholder=" اكتب اللي بتدور عليه من هنا سواء بالاسم او العنوان او الحاله او السعر او اسم المحل او اسم المنتج او الوصف" class="form-control search">
            </div>
            <main class="col-12 align-items-stretch" >
              <div class="row justify-content-between text-right align-items-stretch">
                  @foreach ($data as $d)
                      <div  style=" position:relative; height: auto !important;" class="card align-items-stretch p-0 my-3 col-lg-2 col-lg-2 col-md-3 col-sm-4 "  >
                          <span class="label label--mini background-color--primary px-2 pb-3" style="position:absolute;top: 0;right: 0;"> {{ $d->stauts }} </span>
                          <img style="width: 100%;" src="https://dash.faster-eg.com/images/computers/{{ $d->imghome }} " class="card-img-top"  alt=" {{ $d->name }} ">
                          <p class="label label--mini background-color--primary w-100 text-center" style="height: auto;"> {{ $d->address }} </p>
                          <div class="card-body">
                          <a href="{{ route('computers.show',$d->id) }}"> <h5 class="card-title"> {{ $d->name }} </h5></a>
                          <a href="{{ route('computers.show',$d->id) }}"><p class="card-text"> {{ $d->summry }} </p></a>
                          <div>
                              <span style="text-decoration: line-through">{{ $d->price }} </span>&nbsp;&nbsp;&nbsp;&nbsp;
                              <span> {{ $d->discount }}  </span>
                          </div>
                          <span class="label label--mini background-color--secondary" style="height: auto;"> {{ $d->saler }} </span>
                          </div>
                      </div>
                @endforeach
              </div>
            </main>

          </div>
    </div>
    <center class="my-3 page" style="margin: auto !important">
        {{ $data->links() }}
    </center>
@endsection

