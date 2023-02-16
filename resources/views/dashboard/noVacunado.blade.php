
@extends('layouts.padreDashboard')

@section('title', 'Registrar')

@section('content')


   {{ auth()->user() }}
<div style="height: 100%; width: 100%; display: flex; justify-content: center; align-items: center">
    <div class="col-sm-6" style="box-shadow: 4px 5px 5px 0px #0005;">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 25px; font-weight: bold; text-align: center; margin-bottom: 10px;">Informacion de Vacunacion</h3>
            </div>

            <!--Horizontal Form-->

            <!--===================================================-->
            <form class="form-horizontal" method="POST" action="/dashboard/{{ auth()->user()->datos_extras_id }}/dataNoVacunado">

                @csrf

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Tipo de Vacuna</label>
                        <div class="col-sm-9">
                            <select name="tipo_vacuna" id="tipo_vacuna">
                                <option value="">Seleccionar</option>
                                <option value="Sinovac">Sinovac</option>
                                <option value="AstraZeneca">AstraZeneca</option>
                                <option value="Pfizer">Pfizer</option>
                            </select>
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('tipo_vacuna'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Número de Dosis</label>
                        <div class="col-sm-9">

                            <select name="numero_dosis" id="numero_dosis">
                                <option value="">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>

                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('numero_dosis'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Fecha de Vacunacion</label>
                        <div class="col-sm-9">
                            <input type="date" placeholder="fecha_vacunacion" id="fecha_vacunacion" class="form-control" name="fecha_vacunacion" value="{{ old('fecha_vacunacion') }}">
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="phoneNumber" data-bv-result="INVALID" style="color: red">@error('fecha_vacunacion'){{ $message }}@enderror</small>
                    </div>


                    </div>

                </div>




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
