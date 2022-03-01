<section class="content">
    <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('front.name')</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <input value="{{request()->req}}" name="reqType" type="hidden" class="form-control pull-right">
                                <input value="{{$person->name}}" required name="name" type="text" class="form-control pull-right">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('front.region')</label>
                            <select name="region_id" class="form-control selectRegion" style="width: 100%;">
                                <option value="">@lang('front.select region')</option>
                                @foreach(\App\Region::get() as $region)
                                    <option {{($region->id==$person->region_id)?'selected':''}} value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('front.address')</label>
                            <input value="{{$person->address}}" name="address" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('front.pricetype')</label>
                            <select name="priceType" class="form-control select2" style="width: 100%;">
                                <option {{$person->priceType=="one"?'selected':''}} value="one">@lang('front.Sector')</option>
                                <option {{$person->priceType=="half"?'selected':''}} value="half">@lang('front.Half wholesale')</option>
                                <option {{$person->priceType=="multi"?'selected':''}} value="multi">@lang('front.Wholesale')</option>
                                <option {{$person->priceType=="gomla_gomla_price"?'selected':''}} value="gomla_gomla_price">@lang('front.Wholesale Wholesale')</option>

                            </select>
                            <input type="hidden" value="{{Auth::user()->name}}" name="whoadd">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('front.telephone') 1</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input value="{{$person->mobile}}" name="mobile" type="text" class="form-control pull-right">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('front.telephone') 2</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input value="{{$person->mobile2}}" name="mobile2" type="text" class="form-control">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('front.The balance of the first duration')</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input value="{{abs($person->balance)}}" name="start_balance"  type="number" class="form-control pull-right">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group checkbox">
                                    <label style=" margin-top: 15px; ">
                                        <input value="1" {{$person->balance<0||$type!='client'?'checked':''}} name="dept" type="radio" class="flat-red">
                                        @lang('front.creditor')</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group checkbox">
                                    <label style=" margin-top: 15px; ">
                                        <input {{$person->balance>0||$type=='client'?'checked':''}} value="2" name="dept" type="radio" class="flat-red">
                                        @lang('front.debit')</label>
                                </div>
                            </div>
                    <div style="padding-top: 10px;" class="col-md-12">
                        <div class="form-group">
                            <label>@lang('front.isclientandsupplier')</label>
                            <input id="is_client_supplier" name="is_client_supplier" @if($person->is_client_supplier) checked @endif type="checkbox" class="flat-red ">
                        </div>
                    </div>
                    <div style="padding-top: 10px;" class="col-md-4">
                        <div class="form-group">
                            <label>@lang('front.Remind me to review the account')</label>
                            <input name="remember_review_balance" @if($person->remember_review_balance) checked @endif type="checkbox" class="flat-red ">
                        </div>
                    </div>
                    <div class="form-group col-md-4">

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input readonly name="remember_date" type="text" value="{{($person->remember_date)?:''}}"  id="datepicker" class="form-control">
                        </div>
                        <!-- /.input group -->
                    </div>
                    @if(!$person->id)
                    <div class="form-group col-md-12">
                        <label>@lang('front.title')</label>
                        <textarea class="form-control" name="comment"></textarea>
                    </div>
                    @endif
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('front.save')</button>
            </div>
        </div>
</section>
<script>
    $('#datepicker').datepicker({
        autoclose: true,
        rtl: true,
        format: 'yyyy-mm-dd',
        language: "{{\Session::get('locale')}}",

    });
    $(".select2").select2();

    $(".selectRegion").select2({
        tags: true,
        //selectOnClose: true,
        //allowClear: true,
        createTag: function (params) {
            var term = $.trim(params.term);
            if (term === '') {
                return null;
            }
            return {
                id: term,
                text: term
            };
        }
    }).on('select2:select', function (evt) {
        $.ajax({
            type: "POST",
            url: "{{route('regions.store')}}",
            data: {
                _token: "{{ csrf_token() }}",
                name:evt.params.data.text,
                type:1
            },
            success: function(data)
            {
                $(".selectRegion").html(data);
            }
        });
    });
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });
    $(document).on('click','#is_client_supplier',function(e){
        e.preventDefault();
        if($('#is_client_supplier').is(':checked'))
           alert("checked");
        else
            alert("unchecke");
    });
</script>
@if(request()->req=='ajax')
    <script>
    $(function () {
        $("#personForm").submit(function(e) {
            var form = $(this);
            var url = form.attr('action');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data)
                {
                    $("#personList").empty();
                    $("#personList").append(data);
                    $("#personList option:last").attr("selected", "selected");
                    $('#addPersonModal').modal('toggle');
                    selectRefresh();
                    $( "#personList" ).trigger('change');


                }
            });
        });
    });
    </script>
@endif
