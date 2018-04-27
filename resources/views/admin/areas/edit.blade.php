@extends('layouts.admin')
@section ('header')
    <h1>AREA <small>{{$area->name}}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Areas</li>
        <li class="active">Edit</li>
    </ol>
@stop
@section ('content')
    <form method="POST" action="{{ route('admin.areas.update', $area) }}">
        {{method_field('PUT')}}
        @include('admin.areas.partials.form')
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/dropdown.js') }}" defer></script>
@endpush