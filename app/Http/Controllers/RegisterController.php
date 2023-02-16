<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DatosExtra;

class RegisterController extends Controller
{

    public function create()
    {
        return view('auth.resguiter');
    }

    public function store(Request $request)
    {

        $messages = [
            'cedula.required' => 'El campo de cédula es obligatorio.',
            'cedula.unique' => 'La cédula ya está en uso.',
            'cedula.numeric' => 'La cédula debe ser un números.',
            'cedula.digits' => 'La cédula debe tener exactamente 10 dígitos.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'email.email' => 'El correo electrónico no es válido.',
            'nombres.required' => 'El campo de nombres es obligatorio.',
            'apellidos.required' => 'El campo de apellidos es obligatorio.',
            'nombres.regex' => 'Los nombres no deben contener números ni caracteres especiales.',
            'apellidos.regex' => 'Los apellidos no deben contener números ni caracteres especiales.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];

        $this->validate(request(), [
            'cedula' => 'required|unique:users,cedula|numeric|digits:10',
            'email' => 'required|unique:users,email|email',
            'nombres' => 'required|regex:/^[\pL\s]+$/u',
            'apellidos' => 'required|regex:/^[\pL\s]+$/u',
            'password' => 'required|string|min:6|confirmed',
        ], $messages);


        $datos_exta = new DatosExtra();
        $datos_exta->save();


        $user = User::create([
            'nombres' => request('nombres'),
            'apellidos' => request('apellidos'),
            'cedula' => request('cedula'),
            'email' => request('email'),
            'password' => request('password'),
            'datos_extras_id' => $datos_exta->id,
            'roles_id' => 2,
        ]);


        auth()->login($user);

        // return [$user, $datos_exta];

        return redirect()->to('/dashboard/completarDatos');
    }
}
