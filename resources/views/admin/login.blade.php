@extends('admin.layouts.app')

@section('content')

<body>
<div class="middlePage">
    <div class="page-header">
        <h1 class="logo">سلام <small>خوش  آمدید</small></h1>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">لطفا وارد شوید</h3>
        </div>
        <div class="panel-body">

            <div class="row">

                <div class="col-md-5" style="float: left">
                    {{--Image::make(Input::file('photo'))->resize(300, 200)->save('foo.jpg'); --}}
                   TEXT
                </div>

                <div class="col-md-7" style="border-left:1px solid #ccc;height:160px">

                    @if(Session::has('error'))
                        <ul class="alert alert-danger">
                            <li>{{ Session::get('error') }}</li>
                        </ul>
                    @endif

                    @include('errors.list')

                        {!! Form::open(array('url'=>'homepage', 'class'=>'form-horizontal')) !!}
                        <fieldset>
                            {!! csrf_field() !!}

                            <div class="form-group">
                                {!! Form::label('username','نام:')  !!}
                                {!! Form::text('username',null,['class'=> 'input-md', 'id'=>'username_login'])  !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('password','رمز عبور:')  !!}
                                {!! Form::password('password',null,['class'=> 'input-md', 'id'=>'password_login'])  !!}
                            </div>

                            <div class="spacing">
                                {!! Form::label('checkboxes-0','مرا به خاطر بسپار')  !!}
                                {!! Form::checkbox('remember',(1 or true), null)  !!}
                            </div>

                            <div class="spacing"><a href="{{url('reset/password')}}"><small> مشکلات ورود به سیستم </small></a><br/></div>

                            <div class="form-group">
                                {!! Form::submit('ورود',['class'=> 'btn btn-info btn-sm pull-right', 'id'=>'singlebutton'])  !!}
                            </div>

                        </fieldset>
                    {!! Form::close() !!}

                    <a href="{{url('/register')}}">
                        <button name="register" class="btn btn-info btn-sm pull-left"> ثبت نام</button>
                    </a>

                </div>

            </div>

        </div>
    </div>
    @if(Session::has('reset_message'))
        <ul class="alert alert-danger">
            <li>{{ Session::get('reset_message') }}</li>
        </ul>
    @endif


</div>
</body>


@stop