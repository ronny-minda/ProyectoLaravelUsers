@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')





<div class="col-sm-6" style="box-shadow: 4px 5px 5px 0px #0005;">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center; font-size: 30px; ">Registrarse</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" method="POST" action="">

            @csrf

            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Nombres</label>
                    <div class="col-sm-9">
                        <input type="nombres" placeholder="nombres" id="nombres" class="form-control" name="nombres" value="{{ old('nombres') }}">
                    </div>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('nombres'){{ $message }}@enderror</small>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Apellidos</label>
                    <div class="col-sm-9">
                        <input type="apellidos" placeholder="apellidos" id="apellidos" class="form-control" name="apellidos" value="{{ old('apellidos') }}">
                    </div>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('apellidos'){{ $message }}@enderror</small>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Cedula</label>
                    <div class="col-sm-9">
                        <input type="number" placeholder="cedula" id="cedula" class="form-control" name="cedula" value="{{ old('cedula') }}">
                    </div>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('cedula'){{ $message }}@enderror</small>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Email</label>
                    <div class="col-sm-9">
                        <input type="email" placeholder="Email" id="email" name="email"class="form-control" value="{{ old('email') }}">
                    </div>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('email'){{ $message }}@enderror</small>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Password</label>
                    <div class="col-sm-9">
                        <input type="password" placeholder="Password" id="password" name="password"class="form-control" value="{{ old('password') }}">
                    </div>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('password'){{ $message }}@enderror</small>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Password</label>
                    <div class="col-sm-9">
                        <input type="password" placeholder="Password confirmation" id="password_confirmation" name="password_confirmation"class="form-control" value="{{ old('password') }}">
                    </div>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('password'){{ $message }}@enderror</small>
                </div>

            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-success" type="submit">Sign in</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>


@endsection
