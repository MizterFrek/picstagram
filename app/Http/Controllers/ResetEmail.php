<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ChangeEmailRequest;

class ResetEmail extends Controller
{
    public function store(ChangeEmailRequest $request)
    {
        $session = User::find(auth()->user()->id);
        $user = User::find(auth()->user()->id);
        $session->password=$request->password;
        $email = auth()->user();
        if(auth()->attempt($session->only('id','password')))
        {
            $user->email=$request->email;
            $user->save();
            return redirect()->route('perfil.index')->with('mensaje-email','Email cambiado correctamente');
        }
        return back()->with('mensaje-contraseña','Contraseña Incorrecta');
    }
}
