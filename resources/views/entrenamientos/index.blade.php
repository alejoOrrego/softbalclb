@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Entrenamientos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-entrenamiento')
                        <a class="btn btn-warning" href="{{ route('entrenamientos.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Fecha</th>
                                    <th style="color:#fff;">Hora</th>              
                                    <th style="color:#fff;">Equipos</th>       
                                    <th style="color:#fff;">Tipo de Entrenamiento</th>                             
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($entrenamientos as $entrenamiento)
                            <tr>
                                <td style="display: none;">{{ $entrenamiento->id }}</td>                                
                                <td>{{ $entrenamiento->fecha }}</td>
                                <td>{{ $entrenamiento->hora }}</td>
                                <td>{{ $entrenamiento->equipos }}</td>
                                <td>{{ $entrenamiento->tipo_id}}</td>
                                <td>
                                    <form action="{{ route('entrenamientos.destroy',$entrenamiento->id) }}" method="POST">                                        
                                        @can('editar-entrenamiento')
                                        <a class="btn btn-info" href="{{ route('entrenamientos.edit',$entrenamiento->id) }}">Editar</a>
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
