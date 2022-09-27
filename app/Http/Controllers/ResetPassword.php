<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\SessionGuard;

class ResetPassword extends Controller
{
    public function store(ChangePasswordRequest $request)
    {
        if($request->password === $request->old_password)
        {
            return back()->with('mensaje-contraseña','La contraseña nueva debe ser diferente a la anterior');
        }
        $session = User::find(auth()->user()->id);
        $session->password=$request->old_password;

        if(auth()->attempt($session->only('id','password')))
        {
            $session->password = Hash::make($request->password);
            $session->save();
            return redirect()->route('perfil.index')->with('mensaje-contraseña','Contraseña cambiada correctamente');
        }
        return back()->with('mensaje-contraseña','Contraseña Incorrecta');      
    }
}
