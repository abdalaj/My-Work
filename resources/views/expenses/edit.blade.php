@extends('layouts.app')
@section('title')
    تعديل مصروف
@endsection
@section('header-link')
    <a href=""> تعديل مصروف </a> / المصاريف
@endsection
@section('header-name')
    تعديل مصروف
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"> تعديل مصروف</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($data as $item)
                    <form action="{{ route('expenses.update',$item->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> التاريخ</label>
                                <input  name="date" required value="{{ $item->date }}"  type="date" class="form-control ">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> البيان</label>
                                <input type="text" required value="{{ $item->name }}"  name="name" class="form-control " required placeholder="الاسم">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label">المبلغ</label>
                                <input type="text" required value="{{ $item->mony }}"  name="mony" class="form-control " required placeholder="المبلغ">
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> الخزنه</label>
                                <select name="bank_id" required   class="form-control">
                                    <option value="{{ $bank->find( $item->bank_id)->id }}">{{ $bank->find( $item->bank_id)->name }}</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> المصروف</label>
                                <select name="prushes_type" required class="form-control " >
                                    <option {{$item->prushes_type == 0 ?'selected':''  }} value="0">مصروف عام</option>
                                    <option {{$item->prushes_type != 0 ?'selected':''  }} value="0">aaa</option>
                                    @foreach ($shorka as $s)
                                        <option {{$s->id == $item->prushes_type?'selected':''  }} value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> نوع المصروف</label>
                                <select name="prushes_id"  required class="form-control ">
                                    @foreach ($prushes as $p)
                                        <option {{$p->id == $item->prushes_id?'selected':''  }} value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">
                                    تعديل المصروف
                                </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

