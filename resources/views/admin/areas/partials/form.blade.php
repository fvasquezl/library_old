{{ csrf_field() }}
<div class="col-md-6">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Editando Area: {{$area->name}}</h3>
        </div>
        <div class="box-body">
            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-form-label text-md-right">{{ __('Nombre') }}</label>
                <input id="name"
                       type="text"
                       class="form-control"
                       name="name"
                       value="{{ $area->name or old('name') }}"
                       required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                <label for="code" class="col-form-label text-md-right">{{ __('Codigo') }}</label>
                <input id="code"
                       type="text"
                       class="form-control"
                       name="code"
                       value="{{ $area->code or old('code') }}"
                       required autofocus>

                @if ($errors->has('code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group {{ $errors->has('level') ? ' has-error' : '' }}">
                <label for="level" class="col-form-label text-md-right">{{ __('Nivel de Acceso') }}</label>
                <input id="level"
                       type="number"
                       class="form-control"
                       name="level"
                       min="1"
                       step="1"
                       value="{{ $area->level or old('level') }}"
                       required autofocus>

                @if ($errors->has('level'))
                    <span class="help-block">
                        <strong>{{ $errors->first('level') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
                <label for="parent_id" class="col-form-label text-md-right">{{ __('Area a la que reporta') }}</label>
                <select name="parent_id" id="parent_id"
                        class="form-control ">
                    @foreach ($parents as $parent)
                        <option value="{{$area->parent_id}}" {{ old('parent_id',$parent->id) == $area->parent_id ?'selected':''}}>{{ $parent->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('parent_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('parent_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Guardar informacion
                </button>
                <a href="{{route('admin.areas.index')}}" class="btn btn-danger">Retornar</a>
            </div>
        </div>
    </div>
</div>
