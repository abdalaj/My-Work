@extends('layouts.app')
@section('title')
    Create Prushes
@endsection
@section('content')

<br />
<a style="margin-left:25px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" href="{{ route('prushes.index')}}">
    <i class="material-icons">
        arrow_back
    </i>
    Go To Prushes
    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
</a>
<br />
<br />

<div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h5 class="mdl-card__title-text text-color--white">Create Prushes</h5>
            </div>
            <div class="mdl-card__supporting-text">
                @foreach ($errors->all() as $item)
                <div class="color--red " style="text-align: right;padding-right:10px;">{{ $item }}</div>
                @endforeach
                <form action="{{ route('timer.update',1)}}" enctype="multipart/form-data" method="POST" class="form form--basic" >
                    @csrf
                    @method('PUT')
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">Name Of Prushes</label>
                                <input class="mdl-textfield__input" type="text" value="" id="name" name="name">
                            </div>
                            <div id="found">

                            </div>
                        </div>

                        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">Price Of Prushes</label>
                                <input class="mdl-textfield__input" type="text" value="" id="pri"  name="price">
                            </div>
                        </div>

                        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                               <div style="width: 90%;display: inline-block">
                                    <label style="margin-bottom:15px">Qty Of Prushes</label>
                                    <input class="mdl-textfield__input" type="text"  id="qt">

                                    <input  type="hidden"  id="qat"  name="qty">
                                    <input  type="hidden" id="old_qty" name="old_qty">
                                    <input  type="hidden" id="qty_prush" name="qty_prush">
                                    <input type="hidden" id="amo" name="amo">
                               </div>
                                <div class="old_qty" style="10%;display: inline-block">

                                </div>
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
                        <span class="mdl-button__ripple-container "><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function(){

            const search = document.getElementById('name');
            const found = document.getElementById('found');
            const searchStates  = async searchText=>{
                var res = await fetch('/api/foods');
                const states = await res.json();
                let matches = states.filter(state => {
                   const regex = new RegExp(`^${searchText}`,'gi');
                   return state.name.match(regex) ;
                });
                if (searchText.length === 0) {
                    matches=[];
                    found.style.display = 'none';
                }
                outputHtml(matches);
            };

            const outputHtml = matches=>{
                if (matches.length>0) {
                  found.style.display = 'block';
                  found.style.backgroundColor='white';
                  found.style.width='11%';
                  found.style.height='200px';
                  found.style.padding='10px 20px';
                  found.style.position='absolute';
                  found.style.top='150px';
                  found.style.zIndex='999999999999999';
                  found.style.overflowY='auto';
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <span class='foo' style="text-decoration: none;color: black;font-size:18px;font-weight:300;cursor:pointer">${match.name}
                            <input type="hidden" value='${match.price}' class="priceos">
                            <input type="hidden" value='${match.qty}' class="qtya">
                            <input type="hidden" value='${match.id}' class="idia">
                            <input type="hidden" value='${match.old_qty}' class="old_qt">
                        </span>
                      </li>
                    </ul>
                    `).join('');
                    found.innerHTML = html;
            }
        }
        search.addEventListener('input',() => searchStates(search['value']));

            $("#found").on("click",".foo",function(){
                var a = $(this).text();
                var b = $(this).parent().find('.priceos').val();
                var c = $(this).parent().find('.qtya').val();
                var id = $(this).parent().find('.idia').val();
                var old_qty = $(this).parent().find('.old_qt').val();

                // console.log(old_qty);

                $("#name").val(a);
                $("#pri").val(b);
                // $("#qt").val(c);
                $("#old_qty").val(old_qty);

                $(".old_qty").css({
                    "padding":"10px 5px"
                });
                $(".old_qty").addClass("background-color--primary");


                $(".old_qty").text(old_qty);
                $("#found").hide(400,function(){
                    $(".form").attr("action","/timer/"+id)
                });
                $("#qt").on('keyup',function(){
                    var z = parseInt($(this).val())+parseInt($(".old_qt").val());
                    // console.log(z);
                    $("#qat").val(z);

                    $(".old_qty").text(z);
                    $("#qty_prush").val(parseInt($(this).val()));
                    $("#amo").val($("#qty_prush").val()*b);

                });

            });


        });
    </script>
@endsection
{{-- @extends('layouts.app')
@section('title')
    Create Prushes
@endsection
@section('content')

<br />
<a style="margin-left:25px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" href="{{ route('orders.index')}}">
    <i class="material-icons">
        arrow_back
    </i>
    Go To Prushes
    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
</a>
<br />
<br />

<div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h5 class="mdl-card__title-text text-color--white">Create Prushes</h5>
            </div>
            <div class="mdl-card__supporting-text">
                @foreach ($errors->all() as $item)
                <div class="color--red " style="text-align: right;padding-right:10px;">{{ $item }}</div>
                @endforeach
                <form action="{{ route('prushes.store')}}" enctype="multipart/form-data" method="POST" class="form form--basic" >
                    @csrf
                    @method('PUT')
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">Name Of Prushes</label>
                                <input class="mdl-textfield__input" type="text" value="" id="name" name="name">
                            </div>
                            <div id="found">

                            </div>
                        </div>

                        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <label style="margin-bottom:15px">Price Of Prushes</label>
                                <input class="mdl-textfield__input" type="text" value="" id="pri"  name="price">
                            </div>
                        </div>

                        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield full-size">
                               <div style="width: 90%;display: inline-block">
                                    <label style="margin-bottom:15px">Qty Of Prushes</label>
                                    <input class="mdl-textfield__input" type="text"  id="qt">

                                    <input  type="hidden"  id="qat"  name="qty">
                                    <input  type="hidden" id="old_qty" name="old_qty">
                                    <input  type="hidden" id="qty_prush" name="qty_prush">
                                    <input  type="hidden" id="id" name="id">
                               </div>
                                <div class="old_qty" style="10%;display: inline-block">

                                </div>
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
                        <span class="mdl-button__ripple-container "><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(48px, 11px);"></span></span>
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function(){

            const search = document.getElementById('name');
            const found = document.getElementById('found');
            const searchStates  = async searchText=>{
                var res = await fetch('/api/foods');
                const states = await res.json();
                let matches = states.filter(state => {
                   const regex = new RegExp(`^${searchText}`,'gi');
                   return state.name.match(regex) ;
                });
                if (searchText.length === 0) {
                    matches=[];
                    found.style.display = 'none';
                }
                outputHtml(matches);
            };

            const outputHtml = matches=>{
                if (matches.length>0) {
                  found.style.display = 'block';
                  found.style.backgroundColor='white';
                  found.style.width='11%';
                  found.style.height='200px';
                  found.style.padding='10px 20px';
                  found.style.position='absolute';
                  found.style.top='150px';
                  found.style.zIndex='999999999999999';
                  found.style.overflowY='auto';
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <span class='foo' style="text-decoration: none;color: black;font-size:18px;font-weight:300;cursor:pointer">${match.name}
                            <input type="hidden" value='${match.price}' class="priceos">
                            <input type="hidden" value='${match.qty}' class="qtya">
                            <input type="hidden" value='${match.id}' class="idia">
                            <input type="hidden" value='${match.old_qty}' class="old_qt">
                        </span>
                      </li>
                    </ul>
                    `).join('');
                    found.innerHTML = html;
            }
        }
        search.addEventListener('input',() => searchStates(search['value']));

            $("#found").on("click",".foo",function(){
                var a = $(this).text();
                var b = $(this).parent().find('.priceos').val();
                var c = $(this).parent().find('.qtya').val();
                var id = $(this).parent().find('.idia').val();
                var old_qty = $(this).parent().find('.old_qt').val();

                // console.log(old_qty);

                $("#name").val(a);
                $("#pri").val(b);
                $("#id").val(id);
                // $("#qt").val(c);
                $("#old_qty").val(old_qty);

                $(".old_qty").css({
                    "padding":"10px 5px"
                });
                $(".old_qty").addClass("background-color--primary");


                $(".old_qty").text(old_qty);
                $("#found").hide(400,function(){
                    $(".form").attr("action","/store/"+id)
                });
                $("#qt").on('keyup',function(){
                    var z = parseInt($(this).val())+parseInt($(".old_qt").val());
                    // console.log(z);
                    $("#qat").val(z);
                    $(".old_qty").text(z);
                    $("#qty_prush").val(parseInt($(this).val()));
                });

            });


        });
    </script>
@endsection --}}

