<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vs;

class MatchController extends Controller
{

    
    public function __construct()
    //Es necesario estar registrado para acceder a los contenidos
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    // Mostramos los datos necesarios para el formulario de VS
    {

        $gpss = \App\Gps::all();
        $users3 = User::all();
        $users2 = User::all();
        $users1 = User::all();
        return view('pages.match')->with('users1', $users1)->with('users2', $users2)->with('users3', $users3)->with('gpss', $gpss);     
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

        //Es necesario los siguientes valores para insertar datos en la tabla vs
        $this->validate($request, [
            
            'users1' => 'required',
            'users4' => 'required',
            'gps_vs' => 'required',
            'date_vs' => 'required',
            'time_vs' => 'required',
            'text' => 'required',
            
            ]);
    
            
            $vs = new Vs;
            $vs->users1 = $request->input('users1');
            $vs->users2 = $request->input('users2');
            $vs->users3 = $request->input('users3');
            $vs->users4 = $request->input('users4');
            $vs->gps_vs = $request->input('gps_vs');
            $vs->date_vs = $request->input('date_vs');
            $vs->time_vs = $request->input('time_vs');
            $vs->text = $request->input('text');
            $vs->save();
    
            return redirect('match')->with('success', 'Evento creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    //Muestra de gestion de eventos
    {
        $vs = \App\Vs::all();
        return view('admin.gestvscontrol')->with('vs', $vs);
    }

    public function show2()
    //Muestra eventos vs
    {
        $vs = \App\Vs::all();
        return view('pages.eventsvs')->with('vs', $vs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


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


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    //Borrar evento
    {
        {
            $vs = \App\Vs::find($id);
            $vs->delete();
            return redirect('/gestvscontrol');
        }
    }


}
