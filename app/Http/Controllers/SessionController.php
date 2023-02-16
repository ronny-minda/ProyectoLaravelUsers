<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $messages = [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ];


        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);

        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return redirect()->back()->withInput()->withErrors(['email' => 'El email o la contraseña esta ERRONEAS.']);
        }

        $user = auth()->user()->with('roles')->first();
        $profile = $user->profile;

        return redirect('/dashboard');
    }

    public function destroy()
    {

        auth()->logout();

        return redirect()->to('/dashboard');
    }
}
