@extends('layouts.app')

@section('title', 'Login')

@section('content')

{{-- <a href="/register" class="btn btn-success" style="position: fixed; top: 40px; left: 40px;">Registrarse</a> --}}

<div class="col-sm-6" style="box-shadow: 4px 5px 5px 0px #0005;">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center; font-size: 30px; ">Login</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" method="POST" action="">

            @csrf

            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Email</label>
                    <div class="col-sm-9">
                        <input type="email" placeholder="Email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('email'){{ $message }}@enderror</small>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Password</label>
                    <div class="col-sm-9">
                        <input type="password" placeholder="Password" id="password" name="password"class="form-control">
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
