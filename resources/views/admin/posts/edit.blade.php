@extends('layouts.admin')
@section ('header')
    <h1>PUBLICACIONES
        <small>Creacion</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Posts</li>
        <li class="active">Create</li>
    </ol>
@stop

@section ('content')
    <div class="row">
        <form method="POST" action="{{ route('admin.posts.update',$post) }}" enctype="multipart/form-data">
            {{ csrf_field() }}{{method_field('PUT')}}
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('admin.posts.partials.form-elements1')
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('admin.posts.partials.form-elements2')
                    </div>
                </div>
            </div>
        </form>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Documentos asociados</h3>

                    <div class="box-tools pull-right">
                    </div>
                </div>
               <div class="box-body">
                   <ul class="todo-list">
                       @foreach($post->documents as $document)
                           <li>
                               <form method="POST" action="{{route('admin.documents.destroy',$document->id)}}">
                                   {{method_field('DELETE')}} {{csrf_field()}}
                                   <span class="text"><i class="fa fa-file-pdf-o fa-2x" style="color: red"></i></span>
                                   <span class="text"><a href="{{$document->url}}" target="_blank">{{$document->name}}</a></span>
                                   <!-- General tools such as edit or delete-->
                                   <div class="tools">
                                       <button class="btn btn-link "
                                               onclick="return confirm('Esta seguro de elimiar este documento？')"
                                               style="margin-top: -5px">
                                           <i class="fa fa-trash-o fa-2x" style="color: red"></i>
                                       </button>
                                   </div>
                               </form>
                           </li>
                       @endforeach
                   </ul>
               </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <!-- DatePicker -->
    <link rel="stylesheet" href="/adminlte/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- DropZone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <!-- CK Editor -->
    <script src="/adminlte/components//ckeditor/ckeditor.js"></script>
    <!-- DatePicker -->
    <script src="/adminlte/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- DropZone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
    <!-- Select2 -->
    <script src="/adminlte/components/select2/dist/js/select2.full.min.js"></script>
    <!--Laravel.js -->
    <script src="/js/laravel.js"></script>

    <script>
        $('#datepicker').datepicker({
           autoclose:true
        });
        $('.select2').select2();


        CKEDITOR.replace('excerpt');
        CKEDITOR.config.height = 250;

        var myDropzone = new Dropzone('.dropzone',{
            url: '/admin/posts/{{$post->url}}/document',
            paramName: 'documento',
            acceptedFiles: '.pdf',
            maxFilesize: 250,
            //maxFiles: 1,
            dictDefaultMessage:'Arrastra el/los documentos aqui',
            headers:{
              'X-CSRF-TOKEN':'{{csrf_token()}}'
            },
        });
        myDropzone.on('error',function (file,res) {
            var msg = res.errors.post[0];
            $('.dz-error-message:last > span').text(msg)
        });

        Dropzone.autoDiscover = false;

    </script>
@endpush