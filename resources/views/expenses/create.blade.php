@extends('layouts.app')
@section('title')
    دفع مصروف
@endsection
@section('header-link')
    <a href=""> دفع مصروف </a> / المصاريف
@endsection
@section('header-name')
    دفع مصروف
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"> دفع مصروف</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('expenses.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> التاريخ</label>
                                <input  name="date" required  type="date" class="form-control ">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> البيان</label>
                                <input type="text" required name="name" class="form-control " required placeholder="الاسم">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label">المبلغ</label>
                                <input type="text" required name="mony" class="form-control " required placeholder="المبلغ">
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> الخزنه</label>
                                <select name="bank_id" required class="form-control">
                                    {{-- @foreach ($bank as $b) --}}
                                        <option value="{{ $bank->find(Auth::user()->bank_id)->id }}">{{ $bank->find(Auth::user())->name }}</option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> المصروف</label>
                                <select name="prushes_type" required class="form-control " >
                                    <option value="0">مصروف عام</option>
                                    @foreach ($shorka as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> نوع المصروف</label>
                                <select name="prushes_id"  required class="form-control ">
                                    @foreach ($prushes as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">
                                    دفع المصروف
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')
    <script>
        $("form").validator();
    </script>
@endsection --}}
