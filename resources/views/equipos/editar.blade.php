@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Equipos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">     
                                                                      
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                    <form action="{{ route('equipos.update',$equipo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="nombre">nombre</label>
                                   <input type="text" name="nombre" class="form-control" value="{{ $equipo->nombre }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                <label for="entrenador">Entrenador</label>
                                <input type="text" name="entrenador" class="form-control" value="{{ $equipo->entrenador }}">
                              
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                <label for="categoria">categoria</label>
                                <input type="text" name="categoria" class="form-control" value="{{ $equipo->categoria }}">
                               
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                <label for="cantidad_integrantes">Cantidad de integrantes</label>
                                <input type="number" name="cantidad_integrantes" class="form-control" value="{{ $equipo->cantidad_integrantes }}">
                                
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>                            
                        </div>
                    </form>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

