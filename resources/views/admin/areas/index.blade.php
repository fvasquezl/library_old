@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Areas</h3>
                        <a href="{{route('areas.create')}}" class="btn btn-primary float-right">Create Area</a>
                    </div>

                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Nivel Acceso</th>
                            <th>Reporta a:</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($areas as $area)
                            @if(!$area->parent_id==0 && !$area->level==0)
                            <tr>
                                <td>{{$area->code}}</td>
                                <td class="text-left"><a href="{{route('areas.show',$area->url)}}">{{$area->name}}</a></td>
                                <td>{{$area->level}}</td>
                                <td>{{($area->parent_id === 1) ? '--': $area->parent->code }}</td>
                                <td class="text-left">
                                    <a href="{{route('areas.edit',$area)}}" class="btn btn-success btn-sm">Editar</a>
                                    @if($area->level !=1)
                                        <a href="{{route('areas.destroy',$area)}}" class="btn btn-danger btn-sm">Eliminar</a>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    {{ $areas->render() }}
                </div>
            </div>
        </div>
@stop