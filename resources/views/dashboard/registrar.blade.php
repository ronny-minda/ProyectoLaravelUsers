
@extends('layouts.padreDashboard')

@section('title', 'Registrar')

@section('content')

@section('registrar', 'active-link')


<div style="height: 100%; width: 100%; display: flex; justify-content: center; align-items: center">
    <div class="col-sm-6" style="box-shadow: 4px 5px 5px 0px #0005;">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 25px; font-weight: bold; text-align: center; margin-bottom: 10px;">Registrar nuevo usuario</h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->
            <form class="form-horizontal" method="POST" action="/dashboard">

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
                            <input type="cedula" placeholder="cedula" id="cedula" class="form-control" name="cedula" value="{{ old('cedula') }}">
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

                    </div>

                </div>



                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif



                <div class="panel-footer text-right">
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>
</div>


@endsection
