<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index () 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
       //validacion
       $request->request->add(['username'=>Str::slug($request->username)]);

       $this->validate($request,[
        'name'      =>  'required|max:30|regex:/^[\pL\s\-]+$/u',
        'username'  =>  'required|unique:users|min:3|max:30',
        'email'     =>  'required|unique:users|email|max:60',
        'password'  =>  'required|confirmed|min:6'
        
        /** 
         * Validacion estricta de contraseña
         * @uses \Illuminate\Validation\Rules\Password
         */ 
         //Password::min(6)                //  minimo 6 caracteres
         //   ->letters()                 //  al menos una letra
         //   ->mixedCase()               //  al menos una minuscula y una mayuscula
         //   ->numbers()                 //  al menos un numero
         //   ->symbols()                 //  al menos un simbolo
         //   ->uncompromised()           //  La contraseña no debe estar comprometida. Consulta la pwd con la API https://haveibeenpwned.com/API/v2. Evita una contraseña facil
             
       ]);

       $user = User::create([
        'name'      => $request->name,
        'username'  => $request->username,
        'email'     => $request->email,
        'password'  => Hash::make($request->password)
       ]);

       //Autenticar usuario
       auth()->attempt($request->only('email','password'));
       
       //Redireccionar al muro
        return redirect()->route('posts.index', ['user' => $user]);
    }
    
}
