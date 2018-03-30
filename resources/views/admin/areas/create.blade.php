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

                                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                    <label for="code" class="control-label">Codigo </label>
                                    <input id="code"
                                           type="text"
                                           class="form-control"
                                           name="code"
                                           value="{{ old('code') }}"
                                           required autofocus>

                                    @if ($errors->has('code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="control-label">Nombre</label>
                                    <input id="name"
                                           type="text"
                                           class="form-control"
                                           name="name"
                                           value="{{ old('name') }}"
                                           required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label for="level" class="control-label">Nivel de Acceso</label>
                                    <input id="level"
                                           type="number"
                                           class="form-control"
                                           name="level"
                                           value="{{ old('level') }}"
                                           required autofocus>

                                    @if ($errors->has('level'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
                                    <label>Area a la que reporta</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">Seleccione un area</option>
                                        <option value="0">Nivel0 - Raiz</option>
                                        @foreach($parents as $parent)
                                            <option value="{{$area->id}}"
                                                    {{old('parent_id', $area->parent_id) == $area->id ? 'selected' : ''}}
                                            >{{ucfirst($area->access->name)}} - {{$area->name}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('parent_id','<span class="help-block">:message</span>') !!}
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar Area
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection