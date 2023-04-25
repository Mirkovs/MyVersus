<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gps;

class GpssController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Inidice
        $title = "Zonas disponibles";
        $gpss = \App\Gps::all();   
            return view('pages.place')->with('gpss', $gpss)->with('title', $title);
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
        //Es necesario los siguientes valores
        $this->validate($request, [
            
                'lugar' => 'required',
                'gps1' => 'required',
                'gps2' => 'required',
                'url' => 'required',
        ]);

        
        //Creamos los campos necesarios para nuestro marcador del mapa
        $gps = new Gps;
        $gps->lugar = $request->input('lugar');
        $gps->url = $request->input('url');
        $gps->gps1 = $request->input('gps1');
        $gps->gps2 = $request->input('gps2');
        
        $gps->save();
        
        return redirect('/place')->with('success', 'Zona creada');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
        //Muestra del control de las zonas
    {
        $gpss = \App\Gps::all();
        return view('admin.gestgpscontrol')->with('gpss', $gpss);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
        //Muestra la posición que queremos editar
    {
        $gpss = \App\Gps::find($id);
        return view('admin.gpsedit')->with('gpss', $gpss);
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
        //Valores requeridos y que insertaremos en la tabla gps
        
        $this->validate($request, [
            'lugar' => 'required',
            'gps1' => 'required',
            'gps2' => 'required',
            'url' => 'required',
        ]);
        
        //Actualizamos ZONA
        $gpss = \App\Gps::find($id);
        $gpss->lugar = $request->input('lugar');
        $gpss->gps1 = $request->input('gps1');
        $gpss->gps2 = $request->input('gps2');
        $gpss->url = $request->input('url');
        $gpss->save();
        
        return redirect('/gestgpscontrol');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    //Eliminar una zona
    {
        {
            $gpss = \App\Gps::find($id);
            $gpss->delete();
            return redirect('/gestgpscontrol');
        }
    }
}
