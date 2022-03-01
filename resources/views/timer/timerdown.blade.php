@extends('layouts.app')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <center>
            <div id="chronoExample">
                <div class="values " style="font-size: 20px;background: #eee;color:black;width:50%">
                        <style>
                            .form-control{
                                width: 100%;
                                border: none;
                                outline: none;
                                padding: 10px
                            }
                        </style>
                        <div class="form-group">
                           <input type="text"  id="hours" class="form-control" placeholder="اكتب الوقت">
                        </div>

                        @if (count($order)>0)
                            @foreach ($order as $ord)
                            
                                @if ($ord->copy_start!=0)
                                    @section('script')
                                        <script>
                                            var hour = "{{ $ord->hours }}".toString().split(".")[0];
                                            var minuts ="{{ $ord->hours }}".toString().split(".")[1];
                                            
                                            document.getElementById("hours").value = hour + ":" + minuts ;
                                            var x = setInterval(function() {
                                                minuts=minuts-1;
                                                if (minuts==0) {
                                                    hour=hour-1;
                                                    minuts=59;
                                                    
                                                }
                                                document.getElementById("hours").value = hour + ":" + minuts ;
                                                var h = (document.getElementById("hours").value).toString().split(':')[0];
                                                var m = (document.getElementById("hours").value).toString().split(':')[1];
                                                // console.log(h);
                                                // console.log(m);
                                                if (h==0 && m==0) {
                                                    // console.log("finshed!");
                                                    alert("finshed!");
                                                }
                                            }, 60000);
                                        </script>
                                    @endsection
                                @endif
                            @endforeach

                        @endif
                </div>
                <div style="margin-top: 25px !important">
                    <style>
                        button{
                            color: white
                        }
                        button:hover{
                            cursor: pointer;
                        }
                        form{
                            display: inline-block
                        }
                    </style>
                    <form action="{{route('timedown.store')}}" id="for" method="POST">
                        @csrf
                        @foreach ($data as $item)
                            <input type="hidden" value="{{$item->id}}" name="room_id">
                            <input type="hidden" value="{{$item->name}}" name="name">
                            <input type="hidden" name="end" class="end">
                            <input type="hidden" name="hours" class="hours">
                            <input type="hidden" class="start" name="start">

                            <input type="hidden" value="{{$item->price}}" name="price">
                        @endforeach

                        @foreach ($order as $ord)
                            @foreach (explode(":",$ord->copy_start) as $exp)
                                @php
                                    $ex= $exp;
                                @endphp
                            @endforeach
                            @if (( $exp == 0) || ($ord->copy_start == null))

                                <button type="submit" class="startButton btn btn-primary" style="padding: 15px 30px;background: #007bff;border:1px solid #171717" onClick="$('.timer').countimer('start');">Start</button>
                            @else
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    $(function(){
                                        $("#for").attr("action","{{route('timedown.update',$ord->id)}}")
                                    });
                                </script>
                                @method('PUT')
                                <button   class="stopButton btn btn-danger" style="padding: 15px 30px;background: #dc3545;border:1px solid #171717" onClick="$('.timer').countimer('stop');">Stop</button>

                                <br><br><br>
                                <div class="mdl-grid">
                                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
                                        <div class="">
                                            <div class="mdl-textfield mdl-js-textfield full-size">
                                                <input class="mdl-textfield__input" type="text" placeholder="ماكولات...............................؟" value="" id="eat"  name="name">
                                            </div>
                                            <div id="found" >

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                        @if ($order->count() == 0)
                                <button type="submit" class="startButton btn btn-primary" style="padding: 15px 30px;background: #007bff;border:1px solid #171717">Start</button>
                        @endif
                    </form>

                </div>
            </div>
        </center>

        <br>

        @foreach ($order as $ord)
            @foreach (explode(":",$ord->copy_start) as $exp)
                @php
                    $ex= $exp;
                @endphp
            @endforeach
        @if (($exp == 0) || ($ord->copy_start == null))

        @else

            <div class="mdl-grid ui-tables">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text">All Order Of Me</h1>
                    </div>
                    <form action="{{ route('orderfood.store') }}" method="POST" >
                        @csrf
                            <div class="mdl-card__supporting-text no-padding">
                                <table class="mdl-data-table mdl-js-data-table bOrdered-table">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__cell--non-numeric">Name </th>
                                            <th class="mdl-data-table__cell--non-numeric">Price</th>
                                            <th class="mdl-data-table__cell--non-numeric edit">Actions</th>
                                        </tr>
                                    </thead>

                                        <tbody class="tb">
                                            @foreach ($order as $ord)
                                                <input type="hidden" value="{{ $ord->id }}" name="ord_id">
                                                <input type="hidden" value="{{ $ord->unique }}" name="unique">
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3">
                                                    <button  style="width: 100%" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" data-upgraded=",MaterialButton,MaterialRipple" >
                                                        <i class="material-icons">add</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tfoot>

                                </table>
                            </div>
                        </form>
                </div>
            </div>

        </div>
        @endif
        @endforeach


@endsection
@section('script')

<script type="text/javascript">
    $( document ).ready(function() {
        var x = new Date();

                $('.timer').countimer({
                    autoStart : false,
                    initHours : x.getHours(),
                    initMinutes : x.getMinutes(),
                    initSeconds: x.getSeconds()
                });
                var a = x.getMinutes()

                if (x.getMinutes()<10) {
                    var a = "0"+x.getMinutes()
                }
                $(".start").val(x.getHours()+":"+a+":"+x.getSeconds());


        var now=$(".timer").text();
        now = now.split(":")[0]+"."+now.split(":")[1];


            $("#hours").keyup(function(){
                var hours = $(this).val();
                var start=$(".start").val();
                $(".hours").val(hours);
                start = start.split(":")[0]+"."+start.split(":")[1];

                var full = (parseFloat(start) + parseFloat(hours)).toFixed(2);

                $(".end").val(full);

                if ($(".end").val().toString().split(".")[1]>=60) {

                    var m = parseInt($(".end").val().toString().split(".")[1])-60;
                    var h = parseInt($(".end").val().toString().split(".")[0])+1;

                    $(".end").val(h+"."+m);
                    // $(".timer").text(h+"."+m);
                }
                if ($(".end").val().toString().split(".")[1]<10) {
                    var m = parseInt($(".end").val().toString().split(".")[1]);
                    var h = parseInt($(".end").val().toString().split(".")[0]);

                    $(".end").val(h+"."+"0"+m);
                    // $(".timer").text(h+"."+m);
                }
            });
            // var hour = $("#hours").val().toString().split(".")[0];
            // var minuts = $("#hours").val().toString().split(".")[1];
            // var time = hour+":"+minuts+":00";
            // ($('#hours').val().toString()).countimer({
            //                                 autoStart : true,
            //                                 initHours: hour,
            //                                 initMinutes: minuts,
            //                                 initSeconds: 01
            //                             });
        });

</script>

@endsection
