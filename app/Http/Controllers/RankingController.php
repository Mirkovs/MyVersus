<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RankingController extends Controller
{

    public function __construct()
    //Para acceder a estos controladores es necesario estar registrado, menos index e index2
    {
        $this->middleware('auth', ['except' => ['index','index2']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Vamos a mostrar solo los 10 primeros en el ranking
        $users = User::orderBy('points','desc')->paginate(10);
        return view('pages.ranking')->with('users', $users);        
    }

    public function index2()
    {
        // Vamos a mostrar solo los 10 primeros en la gestión de usuarios
        $users = User::orderBy('points','desc')->paginate(10);
        return view('admin.gestusercontrol')->with('users', $users);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
        //Muestra de los puntos en la gestión de puntos
    {
        $users = User::orderBy('points','desc')->paginate(10);
        return view('admin.gestpointscontrol')->with('users', $users); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
        //Muestra los puntos segun el id del usuario seleccionado
    {
        $users = User::find($id);
        return view('admin.pointedit')->with('users', $users);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'points' => 'required',
        ]);
        
        //Actualizamos PUNTOS

        $users = User::find($id);
        $users->points = $request->input('points');
        
        $users->save();
        
        return redirect('/gestpointscontrol');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        //Borramos usuario
    {
        $users = User::find($id);    
        $users->delete();
        return redirect('/gestusercontrol');
    }


}
