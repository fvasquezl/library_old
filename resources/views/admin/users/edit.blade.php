@extends('layouts.admin')
@section ('header')
    <h1>USUARIO
        <small>{{$user->name}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Users</li>
        <li class="active">Edit</li>
    </ol>
@stop
@section('content')
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        {{method_field('PUT')}}
        @include('admin.users.partials.form')
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/dropdown.js') }}" defer></script>
    {{--<script>--}}
    {{--alert( $('.card-header').next())--}}
    {{--</script>--}}
@endpush