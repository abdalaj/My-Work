@extends('layouts.app')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

        <center>
            <div id="chronoExample">
                <div class="values " style="font-size: 20px;background: #eee;color:black; padding: 10px;width:50%">


                    @foreach ($order?$order:'' as $ord)
                        <span id="now" style="display: none "><?php echo date('h.i') + 2?></span>
                        <span id="start" style="display: none ">{{$ord->start}}</span>
                        <div class="timer well"></div>
                    @endforeach
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
                    <form action="{{route('orders.store')}}" id="for" method="POST">
                        @csrf
                        @foreach ($data as $item)
                            <input type="hidden" value="{{$item->id}}" name="room_id">
                            <input type="hidden" value="{{$item->name}}" name="name">

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
                                        $("#for").attr("action","{{route('orders.update',$ord->id)}}")
                                    });
                                </script>
                                @method('PUT')
                                <input type="hidden" id="hours" name="hours">
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


        $(".start").val(x.getHours()+":"+x.getMinutes()+":"+x.getSeconds());


        var now=$(".timer").text();
        now = now.split(":")[0]+"."+now.split(":")[1];

        var start=$("#start").text();
        start = start.split(":")[0]+"."+start.split(":")[1];
        $(".timer").text(parseFloat(now-start).toFixed(2));
        $("#hours").val(parseFloat(now-start).toFixed(2));
        if ($(".timer").text().split(".")[1]>=60) {
            var m =  parseFloat($(".timer").text().split(".")[1]) - 40;
            var h = parseFloat($(".timer").text().split(".")[0]) ;
            $(".timer").text(h+"."+m);
            $("#hours").val(h+"."+m);

        }

        });

</script>

@endsection
