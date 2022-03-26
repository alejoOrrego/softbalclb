<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Equipo;

class EquipoController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:ver-equipo|crear-equipo|editar-equipo|borrar-equipo')->only('index');
         $this->middleware('permission:crear-equipo', ['only' => ['create','store']]);
         $this->middleware('permission:editar-equipo', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-equipo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::paginate(5);
        return view('equipos.index',compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipos.crear');
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
            'nombre' => 'required',
            'entrenador' => 'required',
            'categoria' => 'required',
            'cantidad_integrantes' => 'required',
        ]);
     
        Equipo::create($request->all());

        return redirect()->route('equipos.index');
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
       
        return view('equipos.editar',compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {

        request()->validate([
            'nombre' => 'required',
            'entrenador' => 'required',
            'categoria' => 'required',
            'cantidad_integrantes' => 'required',
        ]);
    
        $equipo->update($request->all());
    
        return redirect()->route('equipos.index');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
    
        return redirect()->route('equipos.index');
    }
}
