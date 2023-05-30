@extends('layouts.app')
@section('content')
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-head">
            <div class="container">
                <div class="page-title">
                    <h1>الصفحة الشخصية </h1>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">

                @include('includes.messages')

                {!! Form::open(['action' => ['usersController@update',$user->id], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}

                <div class="row">
                  <div class="col-sm-8">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text"  value="{{$user->name}}" class="form-control" id="name" name="name" placeholder="الاسم">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input type="text"  value="{{ $user->email }}" class="form-control" id="email" name="email" placeholder="الايميل">
                      </div>
                    </div>


                  </div>


                </div>

                <div class="row">
                  <div class="col-sm-8">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="phone">رقم الجوال</label>
                          <input type="text"  value="{{ $user->phone }}" class="form-control" id="phone" name="phone" placeholder="رقم الجوال">
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="address">العنوان</label>
                          <input type="text"  value="{{ $user->address }}" class="form-control" id="address" name="address" placeholder="العنوان">
                        </div>
                      </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-8">

                    <div class="col-sm-12">

                      {{Form::hidden('_method' ,'PUT') }}
                      <button type="submit" class="btn blue" id="Modal0" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-save"></i>
                        تعديل</button>

                      {!! Form::close() !!}
                    </div>

                  </div>
                </div>










            </div>
        </div>
    </div>
</div>
@endsection




@section('css')

@endsection


@section('js')



@endsection












