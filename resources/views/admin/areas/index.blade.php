@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Areas</h3>
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">
                            Crear area nueva <i class="fa fa-plus"></i>
                        </button>
                    </div>

                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Nivel Acceso</th>
                            <th>Reporta a:</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($areas as $area)
                            @if(!$area->parent_id==0 && !$area->level==0)
                            <tr>
                                <td>{{$area->id}}</td>
                                <td class="text-left"><a href="{{route('areas.show',$area->url)}}">{{$area->name}}</a></td>
                                <td>{{$area->code}}</td>
                                <td>{{$area->level}}</td>
                                <td>{{($area->parent_id === 1) ? '--': $area->parent->code }}</td>
                                <td class="text-left">
                                    <a href="{{route('areas.edit',$area)}}" class="btn btn-success btn-sm">Editar</a>
                                    @if($area->level !=1)
                                        <form action="{{route('areas.destroy', $area)}}"
                                              method="POST"
                                              style="display: inline">
                                            @csrf {{method_field('DELETE')}}
                                            <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Estas seguro de querer eliminar esta area?')"
                                            >Eliminar<i class="fa fa-times"></i></button>
                                        </form>

                                        {{--<a href="{{route('areas.destroy',$area)}}" class="btn btn-danger btn-sm">Eliminar</a>--}}
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
    </div>
    @include('admin.areas.partials.modal')
@stop
