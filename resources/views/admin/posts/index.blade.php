@extends('layouts.admin')
@section ('header')
    <h1>PUBLICACIONES <small>Todos las publicaciones</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Posts</li>
        <li class="active">Index</li>
    </ol>
@stop

@section ('content')
    <div class="box box-primary">
        <div class="box-header">
            <button class="btn btn-twitter pull-right"
                    data-toggle="modal"
                    data-target="#myModalPost">
                <i class="fa fa-book fa-lg"></i> Crear publicaci&oacute;n nuevo
            </button>
            <h3 class="box-title">Listado de publicaciones</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="posts-table" class="table table-bordered table-striped">
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
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><a href="{{route('admin.posts.show',$post->url)}}">{{str_limit($post->title,50)}}</a></td>
                        <td>{{strip_tags(str_limit($post->excerpt,50))}}</td>
                        <td>{{$post->owner->name}}</td>
                        <td>{{$post->published_at}}</td>
                        <td>
                            <a href="{{route('posts.show',$post)}}"
                               class="btn btn-default btn-xs"
                                target="_blank"
                            >
                                <i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.posts.edit',$post)}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                            <form action="{{route('admin.posts.destroy', $post)}}"
                                  method="POST"
                                  style="display: inline">
                                @csrf {{method_field('DELETE')}}
                                <button id="delete_{{$post->id}}"
                                        class="btn btn-danger btn-xs"
                                        onclick="return confirm('Estas seguro de querer eliminar esta publicacion?')"
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
    @include('admin.posts.partials.modal')
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
            $('#posts-table').DataTable()
        })
    </script>
@endpush