<?php

namespace App\Http\Controllers;

use App\Models\Entrenamiento;
use Illuminate\Http\Request;

class EntrenamientoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-entrenamiento|crear-entrenamiento|editar-entrenamiento|borrar-entrenamiento')->only('index');
         $this->middleware('permission:crear-entrenamiento', ['only' => ['create','store']]);
         $this->middleware('permission:editar-entrenamiento', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-entrenamiento', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrenamientos = Entrenamiento::paginate(5);
        return view('entrenamientos.index',compact('entrenamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrenamientos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        request()->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'equipos' => 'required',
            'tipo_id' => 'required',
        ]);
        
        Entrenamiento::create($request->all());

        return redirect()->route('entrenamientos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrenamiento $entrenamiento)
    {
       
        return view('entrenamientos.editar',compact('entrenamiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrenamiento $entrenamiento)
    {
     
        request()->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'equipos' => 'required',
            'tipo_id' => 'required',
        ]);

        $entrenamiento->update($request->all());

        return redirect()->route('entrenamientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrenamiento $entrenamiento)
    {
        
        $entrenamiento->delete();
    
        return redirect()->route('entrenamientos.index');
    }
}
