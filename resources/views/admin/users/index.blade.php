@extends('layouts.admin')
@section ('header')
    <h1>USUARIOS
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Usuarios</li>
    </ol>
@stop
@section('content')

    <div class="box box-info">
        <div class="box-header">
            <button class="btn btn-info pull-right"
                    data-toggle="modal"
                    data-target="#myModal">
                <i class="fa fa-user-circle fa-lg"></i> Crear un usuario
                </button>
            <h3 class="box-title">Listado de la tabla de usuarios</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="areas-table" class="table table-bordered table-striped">
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
                        <td>
                            <a href="{{route('users.show',$user->id)}}">{{$user->name}}</a>
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->position}}</td>
                        <td>{{$user->getAreaName($user)}}</td>
                        <td>
                            <a href="{{route('users.show',$user)}}" class="btn btn-default btn-xs"><i
                                        class="fa fa-eye"></i></a>
                            <a href="{{route('users.edit',$user)}}" class="btn btn-success btn-xs"><i
                                        class="fa fa-pencil"></i></a>
                            <form action="{{route('users.destroy', $user)}}"
                                  method="POST"
                                  style="display: inline">
                                @csrf {{method_field('DELETE')}}
                                <button class="btn btn-danger btn-xs"
                                        onclick="return confirm('Estas seguro de querer eliminar a este usuario?')"
                                ><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @include('admin.users.partials.modal')
@stop
@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/adminlte/components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="/adminlte/components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/adminlte/components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#areas-table').DataTable()
        })
    </script>
@endpush