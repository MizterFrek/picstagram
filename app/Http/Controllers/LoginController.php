<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required'
        ]);

        
        //verificacion que el email y pass coincidan con la autenticacion
        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            return back()->with('mensaje','Credenciales Incorrectas');
            //back: regresa a la pagina anterior, en este caso "/login"
            //with: una forma de llenar los valores de session
        }
        return redirect()->route('posts.index',auth()->user()->username);
    }
}

