@extends('layouts.admin')

@section('content')
@section ('header')
    <h1>Dashboard
        <small>Administraci&oacute;n</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Dashboard</li>
    </ol>
@stop



@endsection
