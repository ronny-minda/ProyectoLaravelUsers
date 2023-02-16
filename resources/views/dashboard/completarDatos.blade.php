
@extends('layouts.padreDashboard')

@section('title', 'Registrar')

@section('content')

{{-- @section('registrar', 'active-link') --}}
{{ auth()->user() }}


<div style="height: 100%; width: 100%; display: flex; justify-content: center; align-items: center">
    <div class="col-sm-6" style="box-shadow: 4px 5px 5px 0px #0005;">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 25px; font-weight: bold; text-align: center; margin-bottom: 10px;">Completar Datos</h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->
            <form class="form-horizontal" method="POST" action="/dashboard/{{ auth()->user()->id }}/completarDatos">

                @csrf

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Fecha de nacimiento</label>
                        <div class="col-sm-9">
                            <input type="date" placeholder="fecha_nacimiento" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('fecha_nacimiento'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Dirección de domicilio</label>
                        <div class="col-sm-9">
                            <input type="direccion_domicilio" placeholder="direccion_domicilio" id="direccion_domicilio" class="form-control" name="direccion_domicilio" value="{{ old('direccion_domicilio') }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('direccion_domicilio'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Teléfono móvil</label>
                        <div class="col-sm-9">
                            <input type="number" placeholder="telefono_movil" id="telefono_movil" class="form-control" name="telefono_movil" value="{{ old('telefono_movil') }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('telefono_movil'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Estado de vacunación</label>
                        <div class="col-sm-9">
                            <select id="estado_vacunacion" name="estado_vacunacion">
                                <option value="">Seleccionar</option>
                                <option value="Vacunado">Vacunado</option>
                                <option value="No Vacunado">No vacunado</option>
                            </select>
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('estado_vacunacion'){{ $message }}@enderror</small>
                    </div>

                    </div>

                </div>



                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif



                <div class="panel-footer text-right">
                    <button class="btn btn-success" type="submit">Enviar</button>
                </div>
            </form>
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>
</div>


@endsection
