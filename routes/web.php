<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ResetEmail;
use App\Http\Controllers\ResetPassword;


Route::get('/',HomeController::class)->name('home');

Route::controller(RegisterController::class)->group(function(){
    Route::get('/crear-cuenta','index')->name('register');

    Route::post('/crear-cuenta','store');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')
    ->name('login');

    Route::post('/login','store');
});

Route::controller(LogoutController::class)->group(function(){
    Route::post('/logout','store')
    ->name('logout');
});

Route::controller(PerfilController::class)->group(function(){
    //Rutas para el perfil
    Route::get('/editar-perfil','index')
    ->name('perfil.index');

    Route::post('/editar-perfil','store')
    ->name('perfil.store');

    //cambiar email
    Route::get('/editar-perfil/{user:username}/email','editEmail')
    ->name('perfil.edit.email');

    //cambiar contraseña
    Route::get('/editar-perfil/{user:username}/contraseña','editPassword')
    ->name('perfil.edit.password');
});

Route::controller(ResetEmail::class)->group(function(){
    //email cambiado con exito
    Route::post('/editar-perfil/update-email','store')
    ->name('perfil.update.email');
});

Route::controller(ResetPassword::class)->group(function(){
    //contraseña cambiada con exito
    Route::post('/editar-perfil/update-contraseña','store')
    ->name('perfil.update.password');
});

Route::controller(PostController::class)->group(function(){

    Route::get('/{user:username}','index')
    ->name('posts.index');

    Route::get('/posts/create','create')
    ->name('posts.create');

    Route::post('posts','store')
    ->name('post.store');

    Route::get('/{user:username}/posts/{post}','show')
    ->name('posts.show');

    Route::delete('/posts/{post}','destroy')
    ->name('posts.destroy');
});

Route::controller(ComentarioController::class)->group(function(){
    Route::post('/{user:username}/posts/{post}','store')
    ->name('comentarios.store');
});

Route::controller(ImagenController::class)->group(function(){
    Route::post('/imagenes','store')
    ->name('imagenes.store');
});


Route::controller(FollowerController::class)->group(function(){
    //siguiendo usuarios
    Route::post('/{user:username}/follow','store')
    ->name('users.follow');

    Route::delete('/{user:username}/unfollow','destroy')
    ->name('users.unfollow');
});







