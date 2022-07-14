<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Password;

class ResetPassword extends Controller
{
    public function store(ChangePasswordRequest $password)
    {
         $this->validate($password, [
             'old_password'=>'required'
         ]);
         if(auth()->attempt($password->only('username'))){
             dd($password);
             // $usuario = User::find(auth()->user()->id);
             // $usuario->password = Hash::make($password->password);
             // $usuario->save();
        }
        
        
        // dd('incorrecto');

    }
}
