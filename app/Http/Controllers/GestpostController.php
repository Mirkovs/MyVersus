<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class GestpostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    // Necesitamos los posts que han sido creados por el mismo id de usuario
    public function index()
    {

        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.gestpost')->with('posts', $posts);
    }
}
