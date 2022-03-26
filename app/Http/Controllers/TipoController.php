<?php

namespace App\Http\Controllers;
use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
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
        $tipos = Tipo::paginate(5); 
        return view('tipos.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            
        request()->validate([
            'descripcion' => 'required',
        ]);

        Tipo::create($request->all());

            return redirect()->route('tipos.index');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo $tipo)
    {
        return view('tipos.editar',compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo $tipo)
    {
    
            
        request()->validate([
            'descripcion' => 'required',
        ]);

        $tipo->update($request->all());

        return redirect()->route('tipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
    
        return redirect()->route('tipos.index');
    }
}
