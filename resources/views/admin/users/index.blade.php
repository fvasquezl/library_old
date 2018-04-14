@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Usuarios</h3>
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#myModal">
                            Crear usuario
                        </button>
                    </div>

                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Posicion</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td class="text-left">
                                    <a href="{{route('users.show',$user->id)}}">{{$user->name}}</a>
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->position}}</td>
                                <td>{{$user->getAreaName($user)}}</td>
                                <td class="text-left">
                                    <a href="{{route('users.edit',$user)}}" class="btn btn-success btn-sm">Editar</a>
                                    <form action="{{route('users.destroy', $user)}}"
                                          method="POST"
                                          style="display: inline">
                                        @csrf {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Estas seguro de querer eliminar esta area?')"
                                        >Eliminar <i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
    @include('admin.users.partials.modal')
@stop
