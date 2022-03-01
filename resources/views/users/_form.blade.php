<section class="content">
    <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('front.name')</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input value="{{$user->name}}" required name="name" type="text" class="form-control pull-right">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('front.role')</label>
                            <select name="role" class="form-control">
                                @foreach(\App\Role::get() as $role)
                                    <option @if($user->id && optional($user->roles()->first())->id==$role->id) selected="" @endif value="{{$role->id}}">{{$role->display_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('front.username')</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user-plus"></i>
                                </div>
                                <input value="{{$user->email}}" required name="email" type="text" class="form-control">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('front.password')</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user-secret"></i>
                                </div>
                                <input value="" name="password" type="password" class="form-control">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('front.Choose a safe')</label>
                            <select  style="width: 100%;"  name="stores[]" class="form-control  y" required="required">

                                <option value="">  @lang('front.select') </option>
                                @foreach(\App\Bank::where('type',2)->get() as $tresury)
                                    <option  value='{{$tresury->id}}'>{{$tresury->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">@lang('front.stores')</label>
                            <select required  name="treasury_id" class="form-control  x" style="width: 100%;">
                            <option value="" selected>  @lang('front.select') </option>
                            @foreach(\App\Store::get() as $s)
                                <option  value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach

                            </select>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" class="form-control" name="photo">
                            @if(optional($user->getFirstMedia('photo'))->getUrl())
                                <img class="profile-user-img img-responsive img-circle" src="{{optional($user->getFirstMedia('photo'))->getUrl()}}" alt="User profile picture">
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('front.save')</button>
            </div>
        </div>
</section>


