{{ csrf_field() }}
<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
    <label for="code" class="control-label">Codigo </label>
    <input id="code"
           type="text"
           class="form-control"
           name="code"
           value="{{ $area->code or $old('code') }}"
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
           value="{{$area->name or old('name') }}"
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
           min="1"
           step="1"
           value="{{ $area->level or  old('level') }}"
           required autofocus>

    @if ($errors->has('level'))
        <span class="help-block">
            <strong>{{ $errors->first('level') }}</strong>
        </span>
    @endif
</div>


<div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
    <label for="parent_id">Area a la que reporta</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value="{{ $area->parent_id or  old('parent_id') }}">{{ $area->name}}</option>
    </select>
    {!! $errors->first('parent_id','<span class="help-block">:message</span>') !!}
</div>
