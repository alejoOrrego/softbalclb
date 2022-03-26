@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tipos de Entrenamientos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-entrenamiento')
                        <a class="btn btn-warning" href="{{ route('tipos.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Descripcion</th>
                                                   
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($tipos as $tipo)
                            <tr>
                                <td style="display: none;">{{ $tipo->id }}</td>                                
                                <td>{{ $tipo->descripcion }}</td>
                                <td>
                                    <form action="{{ route('tipos.destroy',$tipo->id) }}" method="POST">                                        
                                        @can('editar-entrenamiento')
                                        <a class="btn btn-info" href="{{ route('tipos.edit',$tipo->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-entrenamiento')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                    

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


