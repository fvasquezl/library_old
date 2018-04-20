@extends('layouts.admin')
@section ('header')
        <h1>AREAS<small>Listado</small></h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Admin</a></li>
            <li class="active">Areas</li>
        </ol>
@stop

@section('content')
    <div class="box box-warning">
        <div class="box-header">
            <button class="btn btn-warning pull-right"
                    data-toggle="modal"
                    data-target="#myModal">
                <i class="fa fa-sitemap fa-lg"></i> Crear area nueva
            </button>
            <h3 class="box-title">Listado de la tabla de areas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="areas-table" class="table table-bordered table-striped">
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
                    <tr>
                        <td>{{$area->id}}</td>
                        <td class="text-left"><a href="{{route('areas.show',$area->url)}}">{{$area->name}}</a></td>
                        <td>{{($area->code) ? $area->code : '--'}}</td>
                        <td>{{($area->level >=0) ? $area->level:'--'}}</td>
                        <td>{{($area->parent_id) ? $area->parent->name : '--'}}</td>
                        <td class="text-left">
                            {{--@if($area->level)--}}
                                <a href="{{route('areas.show',$area)}}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                                <a href="{{route('areas.edit',$area)}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                                <form action="{{route('areas.destroy', $area)}}"
                                      method="POST"
                                      style="display: inline">
                                    @csrf {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-xs"
                                            onclick="return confirm('Estas seguro de querer eliminar esta area?')"
                                    ><i class="fa fa-times"></i></button>
                                </form>
                            {{--@endif--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @include('admin.areas.partials.modal')
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