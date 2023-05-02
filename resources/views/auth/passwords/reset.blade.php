
@extends('layouts.app')
@section('content')
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-head">
            <div class="container">
                <div class="page-title">
                    <h1>تغيير كلمة المرور </h1>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                {!! Form::open(['action' => 'usersController@resetPassword', 'method'=>'POST']) !!}
                {{ csrf_field() }}




                <div class="col-md-4">
                    <div class="form-body">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">كلمة المرور الجديدة</label>

                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="control-label">تأكيد كلمة المرور</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>

                        <button type="submit" class="btn blue" style="margin-bottom: 20px;">
                            <i class="fa fa-edit"></i>
                            حفظ</button>
                        </div>
                    </div>

                </form>







            </div>
        </div>
    </div>
</div>
@endsection




@section('css')

@endsection


@section('js')



@endsection





