@extends('admin.layouts.app')

@section('content')


        <h2 class="page-header">مشکلات ورود به سیستم</h2>

        {!! Form::open(array('action'=>'admin\LoginController@selectpost')) !!}

          {!! csrf_field() !!}

           <div class="form-group">
               {!! Form::radio('selectpost',0) !!}
               {!! Form::label('emailpost-0','پست الکترونیک') !!}
           </div>

        <div class="form-group">
            {!! Form::radio('selectpost',1) !!}
            {!! Form::label('smspost-0','پیامک') !!}
        </div>


        <div class="form-group">
            {!! Form::submit('ارسال',['class'=>'btn btn-info btn-sm pull-right'])  !!}
        </div>

        {!! Form::close() !!}


@stop
