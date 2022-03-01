@extends('layouts.app')
@section('header-name')
   استرجاع البيانات
@endsection

@section('header-link')
    <a href=""> استرجاع البيانات</a>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="/restoreget" method="GET">
                <div class="form-group">
                    <label >الملف المراد استرجاع البيانات منه</label>
                    <input type="file" name="file" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    استرجاع البيانات
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
