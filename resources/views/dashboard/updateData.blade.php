
@extends('layouts.padreDashboard')

@section('title', 'Registrar')

@section('content')

<div style="height: 100%; width: 100%; display: flex; justify-content: center; align-items: center">
    <div class="col-sm-6" style="box-shadow: 4px 5px 5px 0px #0005;">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 25px; font-weight: bold; text-align: center; margin-bottom: 10px;">Actualizar mi informacion</h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->
            <form class="form-horizontal" method="POST" action="/dashboard/{{ auth()->user()->id }}/updateData">

                @csrf

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Nombres</label>
                        <div class="col-sm-9">
                            <input type="nombres" placeholder="nombres" id="nombres" class="form-control" name="nombres" value="{{ $datos->nombres }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('nombres'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Apellidos</label>
                        <div class="col-sm-9">
                            <input type="apellidos" placeholder="apellidos" id="apellidos" class="form-control" name="apellidos" value="{{ $datos->apellidos }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('apellidos'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Cedula</label>
                        <div class="col-sm-9">
                            <input type="cedula" placeholder="cedula" id="cedula" class="form-control" name="cedula" value="{{ $datos->cedula }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('cedula'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Email</label>
                        <div class="col-sm-9">
                            <input type="email" placeholder="Email" id="email" name="email"class="form-control" value="{{ $datos->email }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('email'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Fecha de nacimiento</label>
                        <div class="col-sm-9">
                            <input type="date" placeholder="fecha_nacimiento" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" value="{{ $datos->fecha_nacimiento }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('fecha_nacimiento'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Direcci??n de domicilio</label>
                        <div class="col-sm-9">
                            <input type="direccion_domicilio" placeholder="direccion_domicilio" id="direccion_domicilio" class="form-control" name="direccion_domicilio" value="{{ $datos->direccion_domicilio }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('direccion_domicilio'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Tel??fono m??vil</label>
                        <div class="col-sm-9">
                            <input type="number" placeholder="telefono_movil" id="telefono_movil" class="form-control" name="telefono_movil" value="{{ $datos->telefono_movil  }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('telefono_movil'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Fecha de Vacunacion</label>
                        <div class="col-sm-9">
                            <input type="date" placeholder="fecha_vacunacion" id="fecha_vacunacion" class="form-control" name="fecha_vacunacion" value="{{ $datos->fecha_vacunacion }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('fecha_vacunacion'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Estado de vacunaci??n</label>
                        <div class="col-sm-9">
                            <select id="estado_vacunacion" name="estado_vacunacion">

                                <option {{ $datos->estado_vacunacion == 'Vacunado' ? ' selected' : '' }} value="Vacunado">Vacunado</option>
                                <option {{ $datos->estado_vacunacion == 'No Vacunado' ? ' selected' : '' }}  value="No Vacunado">No vacunado</option>
                            </select>
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('estado_vacunacion'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Tipo de Vacuna</label>
                        <div class="col-sm-9">
                            <select name="tipo_vacuna" id="tipo_vacuna">

                                <option {{ $datos->tipo_vacuna == 'Sinovac' ? ' selected' : '' }} value="Sinovac">Sinovac</option>
                                <option {{ $datos->tipo_vacuna == 'AstraZeneca' ? ' selected' : '' }} value="AstraZeneca">AstraZeneca</option>
                                <option {{ $datos->tipo_vacuna == 'Pfizer' ? ' selected' : '' }} value="Pfizer">Pfizer</option>
                            </select>
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('tipo_vacuna'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">N??mero de Dosis</label>
                        <div class="col-sm-9">

                            <select name="numero_dosis" id="numero_dosis">

                                <option {{ $datos->numero_dosis == '1' ? ' selected' : '' }} value="1">1</option>
                                <option {{ $datos->numero_dosis == '2' ? ' selected' : '' }} value="2">2</option>
                                <option {{ $datos->numero_dosis == '3' ? ' selected' : '' }} value="3">3</option>
                                <option {{ $datos->numero_dosis == '4' ? ' selected' : '' }} value="4">4</option>
                            </select>

                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('numero_dosis'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Password</label>
                        <div class="col-sm-9">
                            <input type="password" placeholder="Password" id="password" name="password"class="form-control" value="{{ old('password') }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('password'){{ $message }}@enderror</small>
                    </div>


                </div>



                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif



                <div class="panel-footer text-right">
                    <button class="btn btn-success" type="submit">Crear</button>
                </div>
            </form>
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>
</div>

@endsection
