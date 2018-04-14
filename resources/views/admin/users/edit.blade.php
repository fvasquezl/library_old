@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left"> Empleado <b>"{{$user->name}}"</b></h3>
                    </div>

                    <div class="card-body">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('users.update', $user) }}">
                                {{method_field('PUT')}}
                                @include('admin.users.partials.form')
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar informacion
                                    </button>
                                    <a href="{{route('users.index')}}" class="btn btn-danger">Retornar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/dropdown.js') }}" defer></script>
    <script>
        alert( $('.card-header').next())
    </script>
@endpush