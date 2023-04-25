<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Copiado de auth/verificationcontroller, nos sirve para solo admitir si tenemos autentificación, he añadido un array except al index(indice de posts) y show (mostrar el contenido de post).
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    //Ordenamos la base de datos de posts que se muestra con paginación y descendente en el momento de la creación.
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.index')->with('posts', $posts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //Campos requeridos.
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        //Creamos el post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        //Aqui tambien añadimos la ID del usuario
        $post->user_id = auth()->user()-> id;
        //Guardamos
        $post->save();

        return redirect('/posts')->with('success', 'Anuncio creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
     //Aqui mostramos los Posts que se encuentran almacenados en la base de datos.
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    //Mostrar el post a editar.
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    //Actualizamos los posts
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
    
        //Actualizamos POST
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        
    
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    //Función de borrar post
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts');
    }
}
