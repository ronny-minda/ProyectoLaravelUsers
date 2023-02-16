
@extends('layouts.padreDashboard')

@section('title', 'home')

@section('home', 'active-link')

@section('content')

<h1>home</h1>

					<div class="panel">
					    <div class="panel-heading">
					        <h3 class="panel-title">Filtering</h3>
					    </div>

					    <!-- Foo Table - Filtering -->
					    <!--===================================================-->
					    <div class="panel-body">
					        <table id="demo-foo-filtering" class="table table-bordered table-hover toggle-circle" data-page-size="7">
					            <thead>
					                <tr>
					                    <th data-toggle="true">Acciones</th>
					                    <th data-hide="phone, tablet">estado vacunacion</th>
					                    <th data-hide="phone, tablet">tipo vacuna</th>
					                    <th data-hide="phone, tablet">dosis</th>
					                    <th data-hide="phone, tablet">nombres</th>
					                    <th data-hide="phone, tablet">apellidos</th>
					                    <th data-hide="phone, tablet">cedula</th>
					                    <th data-hide="phone, tablet">email</th>
					                    <th data-hide="phone, tablet">fecha nacimiento</th>
					                    <th data-hide="phone, tablet">direccion domicilio</th>
					                </tr>
					            </thead>
					            <div class="pad-btm form-inline">
					                <div class="row">
					                    <div class="col-sm-6 text-xs-center">
					                        <div class="form-group">
					                            <label class="control-label">Status</label>
					                            <select id="demo-foo-filter-status" class="form-control">
					                                <option value="">Todos</option>
					                                <option value="No Vacunado">No Vacunado</option>
					                                <option value="Vacunado">Vacunado</option>
					                                <option value="Sinovac">Sinovac</option>
					                                <option value="AstraZeneca">AstraZeneca</option>
					                                <option value="Pfizer">Pfizer</option>
					                                <option value="1">Primera Dosis</option>
					                                <option value="2">Segunda Dosis</option>
					                                <option value="3">Tercera Dosis</option>
					                                <option value="4">Cuarta Dosis</option>

					                            </select>
					                        </div>
					                    </div>
					                    <div class="col-sm-6 text-xs-center text-right">
					                        <div class="form-group">
					                            <input id="demo-foo-search" type="text" placeholder="Search" class="form-control" autocomplete="off">
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <tbody>
					                {{-- <tr>
					                    <td>Lauri</td>
					                    <td>Hyland</td>
					                    <td>Blackjack Supervisor</td>
					                    <td>15 Nov 1985</td>
					                    <td><span class="label label-table label-danger">Suspended</span></td>
					                </tr> --}}
                                    @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>

                                            <form action="{{ route('usuarios.destroy', $usuario->id) }}"  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>

                                            <a href="/dashboard/{{ $usuario->id }}/edit" style="margin-left: 5px" class="btn btn-info">Editar</a>
                                        </td>
                                        <td>{{ $usuario->estado_vacunacion }}</td>
                                        <td>{{ optional($usuario->datos_extras)->tipo_vacuna ?? 'N/A' }}</td>
                                        <td>{{ optional($usuario->datos_extras)->numero_dosis ?? 'N/A' }}</td>
                                        <td>{{ $usuario->nombres }}</td>
                                        <td>{{ $usuario->apellidos }}</td>
                                        <td>{{ $usuario->cedula }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->fecha_nacimiento }}</td>
                                        <td>{{ $usuario->direccion_domicilio }}</td>

                                    </tr>
                                    @endforeach
					            </tbody>
					            <tfoot>
					                <tr>
					                    <td colspan="5">
					                        <div class="text-right">
					                            <ul class="pagination"></ul>
					                        </div>
					                    </td>
					                </tr>
					            </tfoot>
					        </table>
					    </div>
					    <!--===================================================-->
					    <!-- End Foo Table - Filtering -->

					</div>







@endsection


{{-- {"id":2,
"nombres":"maikol",
"apellidos":"maikol",
"cedula":"0326953264",
"email":"maikol@gmail.com",
"fecha_nacimiento":"2023-02-11",
"direccion_domicilio":"masfs",
"telefono_movil":"2346523",
"estado_vacunacion":"Vacunado",
"datos_extas_id":1,
"roles_id":2,
"created_at":"2023-02-15T23:26:57.000000Z",
"updated_at":"2023-02-15T23:27:23.000000Z",
"datos_exta":{
    "id":1,
    "tipo_vacuna":"AstraZeneca",
    "fecha_vacunacion":"2023-02-23",
    "numero_dosis":2,
    }
} --}}
