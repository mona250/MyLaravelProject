@extends('admin.layouts.app')

@section('content')
    <div class="well">

    <div class="col-lg-10 col-lg-offset-1 col-sm-10">
        <h2 class="page-header">ثبت نام</h2>

        @include('errors.list')

        {!! Form::open(array('url'=>'register', 'files'=>true)) !!}

        <div class="form-group">
            {!! Form::label('name','نام:')  !!}
            {!! Form::text('name',null,['class'=> 'form-control'])  !!}
        </div>
        {!! csrf_field() !!}

        <div class="form-group">
            {!! Form::label('lastname','نام خانوادگی:')  !!}
            {!! Form::text('lastname',null,['class'=> 'form-control'])  !!}
        </div>

        <div class="form-group">
            {!! Form::label('username','نام کاربری:')  !!}
            {!! Form::text('username',null,['class'=> 'form-control', 'placeholder'=>'someone@example.com'])  !!}
        </div>

        <div class="form-group">
            {!! Form::label('password','کلمه عبور')  !!}
            {!! Form::password('password',['class'=> 'form-control'])  !!}
        </div>

        <div class="form-group">
            {!! Form::label('passwordconfirm','تکرار کلمه عبور')  !!}
            {!! Form::password('passwordconfirm',['class'=> 'form-control'])  !!}
        </div>

        <div class="form-group">
        {!! Form::label('birthday','تاریخ تولد')  !!}
        <br>
        {!! Form::selectRange('day', 1, 31,null,['style'=>'width:290px;height:30px','placeholder'=>'روز'])  !!}
        {!! Form::select('month',$months,null,['style'=>'width:290px;height:30px','placeholder'=>'ماه'])  !!}
        {!! Form::selectRange('year',1320,1385,null,['style'=>'width:290px;height:30px','placeholder'=>'سال'])  !!}
        </div>

        <div class="form-group">
            {!! Form::label('gender','جنسیت')  !!}
            <br>
            {!! Form::select('gender',['0'=>'' , '1'=>'زن', '2'=>'مرد'],null,['class'=> 'form-control'])  !!}
        </div>


        <div class="form-group">
            {!! Form::label('job','شغل:')  !!}
            {!! Form::text('job',null,['class'=> 'form-control'])  !!}
        </div>

        <div class="form-group">
            {!! Form::label('education','میزان تحصیلات')  !!}
            <br>
            {!! Form::select('education',['0'=> ' ', '1'=>'زیردیپلم', '2'=>'دیپلم', '3'=>'کاردانی', '4'=>'کارشناسی', '5'=>'کارشناسی ارشد','6'=>'دکتری'],null,['class'=> 'form-control'])  !!}
        </div>

        <div class="form-group">
            {!! Form::label('field_of_education','رشته تحصیلی:')  !!}
            {!! Form::text('field_of_education',null,['class'=> 'form-control'])  !!}
        </div>

        <div class="form-group">
            {!! Form::label('state','استان')  !!}
            <br>
            {!! Form::select('state[]',$state,null,['class'=> 'form-control','id' => "state"])  !!}
        </div>

        <div class="form-group">
            {{--{!! Form::label('county','شهرستان')  !!}--}}
            {{--<br>--}}
            {{--{!! Form::select('county[]',null,['class'=> 'form-control', 'id' => "county"])  !!}--}}
        </div>

        <span id="show_county_list">
             {!!Form::select('county',[''=>'Select County','class'=> 'form-control','id' => "county"])!!}
        </span>

        <div class="form-group">
            {!! Form::label('city','شهر:')  !!}
            {!! Form::text('city',null,['class'=> 'form-control'])  !!}
        </div>

        <div class="form-group">
            {!! Form::label('village','روستا:')  !!}
            {!! Form::text('village',null,['class'=> 'form-control'])  !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone','شماره تلفن همراه:')  !!}
            {!! Form::text('phone',null,['class'=> 'form-control'])  !!}
        </div>

        <div class="form-group">
            {!! Form::label('email','آدرس پست الکترونیک:')  !!}
            {!! Form::text('email',null,['class'=> 'form-control'])  !!}
        </div>

        <br>

        <div class="form-group">
            {!! Form::label('photo','Photo:')  !!}
            {!! Form::file('photo')  !!}
        </div>

        <br>

        {{--<div class="form-group">--}}
            {{--{!! Form::text('captcha',null)  !!}&nbsp;--}}
           {{--{!! captcha_img()!!}--}}
        {{--</div>--}}
        <div class="form-group">
           &nbsp;
            {!! app('captcha')->display(); !!}
        </div>


        <div class="form-group">
            {!! Form::submit('ثبت نام',['class'=> 'form-control btn-primary'])  !!}
        </div>


        {!! Form::close() !!}
    </div>
    </div>
@endsection
