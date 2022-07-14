<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke()
    {
        //obtener a quienes seguimos
        // dd(auth()->user()->followings->pluck('id')->toArray());
        $ids=auth()->user()->followings->pluck('id')->toArray();
        $post= Post::whereIn('user_id',$ids)->latest()->paginate(20);
        return view('home',[
            'posts'=>$post
        ]);
    }
}
