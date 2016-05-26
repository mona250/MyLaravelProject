<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="http://beyamooz.com/try_it_yourself/bootstrap/bootstrap-rtl.min_.css">
    <link rel="stylesheet" href="http://beyamooz.com/try_it_yourself/bootstrap/bootstrap-rtl.min_.css">
</head>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h2 class="page-header">رهپاد</h2>
                <div class="panel-body">
                   <h4>به زودی شاهد راه اندازی یکی از محصولات گروه رهپاد در این آدرس خواهید بود</h4>

                    {!! Form::open(array('url'=>'login', 'class'=>'form-horizontal')) !!}

                    {!! Form::label('pass_first','پسورد') !!}
                    {!! Form::password('pass_first',null)!!}
                    {!! Form::submit('ورود')!!}

                    {!! Form::close() !!}


                    @if(Session::has('status_error'))
                        <div style="color: red">
                            {{Session::get('status_error')}}
                        </div>
                    @endif

              </div>
            </div>
        </div>
    </div>
</div>
