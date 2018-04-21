@extends('layouts.admin')
@section ('header')
    <h1>DOCUMENTOS <small>Creacion</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Documents</li>
        <li class="active">Create</li>
    </ol>
@stop
@section ('content')
    <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
        @include('admin.documents.partials.form')
    </form>
@endsection
