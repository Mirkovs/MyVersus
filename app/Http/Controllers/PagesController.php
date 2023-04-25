<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = '¡Bienvenido a MY VERSUS!';
        return view('pages.index')->with('title', $title);
    }




}
