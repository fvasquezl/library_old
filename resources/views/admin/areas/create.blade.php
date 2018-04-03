@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Crear un area nueva</h3>
                    </div>

                    <div class="card-body">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('areas.store') }}">
                                {{ csrf_field() }}


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar Area
                                    </button>
                                    <a href="{{route('areas.index')}}" class="btn btn-danger">Retornar</a>
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
@endpush