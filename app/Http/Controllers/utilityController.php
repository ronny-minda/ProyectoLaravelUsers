<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DatosExtra;

class utilityController extends Controller
{

    public function filtrar(Request $request)
    {

        $usuarios = User::with('datosExta')->where('estado_vacunacion', $request->estado_vacunacion)->get();
        return view('dashboard.home')->with('usuarios', $usuarios);
    }



    public function completarDatos()
    {
        return view('dashboard.completarDatos');
    }

    public function completarDatosPost(Request $request, $id)
    {

        $this->validate($request, [
            'fecha_nacimiento' => 'required|date',
            'direccion_domicilio' => 'required|string',
            'telefono_movil' => 'required|string',
            'estado_vacunacion' => 'required|string',
        ], [
            'fecha_nacimiento.required' => 'El campo de fecha de nacimiento es obligatorio.',
            'fecha_nacimiento.date' => 'El campo de fecha de nacimiento debe ser una fecha válida.',
            'direccion_domicilio.required' => 'El campo de dirección de domicilio es obligatorio.',
            'direccion_domicilio.string' => 'El campo de dirección de domicilio debe ser una cadena de caracteres.',
            'telefono_movil.required' => 'El campo de teléfono móvil es obligatorio.',
            'telefono_movil.string' => 'El campo de teléfono móvil debe ser una cadena de caracteres.',
            'estado_vacunacion.required' => 'El campo de estado de vacunación es obligatorio.',
            'estado_vacunacion.string' => 'El campo de estado de vacunación debe ser una cadena de caracteres.',
        ]);


        $usuario = User::find($id);
        $usuario->fecha_nacimiento = $request->get('fecha_nacimiento');
        $usuario->direccion_domicilio = $request->get('direccion_domicilio');
        $usuario->telefono_movil = $request->get('telefono_movil');
        $usuario->estado_vacunacion = $request->get('estado_vacunacion');

        $usuario->save();

        $msg = 'Usuario Actualizado';

        $request->session()->flash('success', 'El usuario ' . $usuario->nombres . ' ha sido actualizado con éxito.');


        return redirect()->to('/dashboard/dataNoVacunado');
    }

    public function dataNoVacunado()
    {

        return view('dashboard.noVacunado');
    }


    public function dataNoVacunadoPost(Request $request, $id)
    {

        $this->validate($request, [
            'tipo_vacuna' => 'required',
            'fecha_vacunacion' => 'required',
            'numero_dosis' => 'required'
        ], [
            'tipo_vacuna.required' => 'El campo tipo de vacuna es obligatorio',
            'fecha_vacunacion.required' => 'El campo fecha de vacunación es obligatorio',
            'numero_dosis.required' => 'El campo número de dosis es obligatorio'
        ]);

        $informacion = DatosExtra::find($id);
        $informacion->tipo_vacuna = $request->get('tipo_vacuna');
        $informacion->fecha_vacunacion = $request->get('fecha_vacunacion');
        $informacion->numero_dosis = $request->get('numero_dosis');

        $informacion->save();

        return redirect()->to('/dashboard');
    }












    public function updateData()
    {
        $user = auth()->user();

        $datos_extra = DatosExtra::find($user->datos_extras_id);

        $user->tipo_vacuna = $datos_extra->tipo_vacuna;
        $user->fecha_vacunacion = $datos_extra->fecha_vacunacion;
        $user->numero_dosis = $datos_extra->numero_dosis;

        return view('dashboard.updateData')->with('datos', $user);
    }

    public function updateDataPost(Request $request, $id)
    {
        $this->validate($request, [
            'cedula' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'nombres' => 'required|regex:/^[\pL\s]+$/u',
            'apellidos' => 'required|regex:/^[\pL\s]+$/u',

            'fecha_nacimiento.required' => 'El campo de fecha de nacimiento es obligatorio.',
            'fecha_nacimiento.date' => 'El campo de fecha de nacimiento debe ser una fecha válida.',
            'direccion_domicilio.required' => 'El campo de dirección de domicilio es obligatorio.',
            'direccion_domicilio.string' => 'El campo de dirección de domicilio debe ser una cadena de caracteres.',
            'telefono_movil.required' => 'El campo de teléfono móvil es obligatorio.',
            'telefono_movil.string' => 'El campo de teléfono móvil debe ser una cadena de caracteres.',
            'estado_vacunacion.required' => 'El campo de estado de vacunación es obligatorio.',
            'estado_vacunacion.string' => 'El campo de estado de vacunación debe ser una cadena de caracteres.',

            'tipo_vacuna.required' => 'El campo tipo de vacuna es obligatorio',
            'fecha_vacunacion.required' => 'El campo fecha de vacunación es obligatorio',
            'numero_dosis.required' => 'El campo número de dosis es obligatorio'
        ], [
            'cedula.required' => 'El campo de cédula es obligatorio.',
            'cedula.numeric' => 'La cédula debe ser un números.',
            'cedula.digits' => 'La cédula debe tener exactamente 10 dígitos.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'email.email' => 'El correo electrónico no es válido.',
            'nombres.required' => 'El campo de nombres es obligatorio.',
            'apellidos.required' => 'El campo de apellidos es obligatorio.',
            'nombres.regex' => 'Los nombres no deben contener números ni caracteres especiales.',
            'apellidos.regex' => 'Los apellidos no deben contener números ni caracteres especiales.',

            'fecha_nacimiento' => 'required|date',
            'direccion_domicilio' => 'required|string',
            'telefono_movil' => 'required|string',
            'estado_vacunacion' => 'required|string',

            'tipo_vacuna' => 'required',
            'fecha_vacunacion' => 'required',
            'numero_dosis' => 'required'
        ]);

        $usuario = User::find($id);
        $usuario->nombres = $request->get('nombres');
        $usuario->apellidos = $request->get('apellidos');
        $usuario->cedula = $request->get('cedula');
        $usuario->email = $request->get('email');
        $usuario->fecha_nacimiento = $request->get('fecha_nacimiento');
        $usuario->direccion_domicilio = $request->get('direccion_domicilio');
        $usuario->telefono_movil = $request->get('telefono_movil');
        $usuario->estado_vacunacion = $request->get('estado_vacunacion');

        if (!($request->get('password') === null)) {
            // return 'se puede guardar el password';
            $usuario->password = $request->get('password');
        }

        $usuario->save();
        $informacion = DatosExtra::find($usuario->datos_extras_id);
        $informacion->tipo_vacuna = $request->get('tipo_vacuna');
        $informacion->fecha_vacunacion = $request->get('fecha_vacunacion');
        $informacion->numero_dosis = $request->get('numero_dosis');

        $informacion->save();

        $request->session()->flash('success', 'Tus datos han sido actualizado con éxito.');

        return redirect()->to('/dashboard/updateData');
    }
}
