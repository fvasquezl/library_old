@extends('layouts.admin')
@section ('header')
    <h1>DOCUMENTOS <small>Todos los documentos</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Documents</li>
        <li class="active">Index</li>
    </ol>
@stop

@section ('content')
    <div class="box box-primary">
        <div class="box-header">
            <button class="btn btn-twitter pull-right"
                    data-toggle="modal"
                    data-target="#myModalDoc">
                <i class="fa fa-book fa-lg"></i> Crear documento nuevo
            </button>
            <h3 class="box-title">Listado de documentos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="documents-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Extracto</th>
                    <th>Creado Por</th>
                    <th>Fecha de publicacion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($documents as $document)
                    <tr>
                        <td>{{$document->id}}</td>
                        <td><a href="{{route('admin.documents.show',$document->url)}}">{{str_limit($document->title,50)}}</a></td>
                        <td>{{strip_tags(str_limit($document->excerpt,50))}}</td>
                        <td>{{$document->user->name}}</td>
                        <td>{{$document->published_at}}</td>
                        <td>
                            <a href="{{route('admin.documents.show',$document)}}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.documents.edit',$document)}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                            <form action="{{route('admin.documents.destroy', $document)}}"
                                  method="POST"
                                  style="display: inline">
                                @csrf {{method_field('DELETE')}}
                                <button id="delete_{{$document->id}}"
                                        class="btn btn-danger btn-xs"
                                        onclick="return confirm('Estas seguro de querer eliminar esta document?')"
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
    @include('admin.documents.partials.modal')
@endsection


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
            $('#documents-table').DataTable()
        })
    </script>
@endpush