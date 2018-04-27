@extends('layouts.admin')
@section ('header')
    <h1>DOCUMENTOS
        <small>Creacion</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Documents</li>
        <li class="active">Create</li>
    </ol>
@stop

@section ('content')
    <div class="row">
        <form method="POST" action="{{ route('admin.documents.update',$document) }}" enctype="multipart/form-data">
            {{ csrf_field() }}{{method_field('PUT')}}
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('admin.documents.partials.form-elements1')
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('admin.documents.partials.form-elements2')
                    </div>
                </div>
            </div>
        </form>
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
    <script>
        $('#datepicker').datepicker({
           autoclose:true
        });
        $('.select2').select2();

        CKEDITOR.replace('excerpt');

        new Dropzone('.dropzone',{
            url:'/admin/documents/{{$document->url}}/pdf',
            dictDefaultMessage:'Arrastra el/los documentos aqui',
            headers:{
              'X-CSRF-TOKEN':'{{csrf_token()}}'
            },
        });
        Dropzone.autoDiscover = false;

    </script>
@endpush