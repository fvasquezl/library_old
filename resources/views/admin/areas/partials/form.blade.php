{{ csrf_field() }}

<div class="form-group">
    <label for="name" class="col-form-label text-md-right">{{ __('Nombre') }}</label>
    <input id="name"
           type="text"
           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
           name="name"
           value="{{ $area->name or old('name') }}"
           required autofocus>

    @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="code" class="col-form-label text-md-right">{{ __('Codigo') }}</label>
    <input id="code"
           type="text"
           class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"
           name="code"
           value="{{ $area->code or old('code') }}"
           required autofocus>

    @if ($errors->has('code'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('code') }}</strong>
        </span>
    @endif
</div>


<div class="form-group">
    <label for="level" class="col-form-label text-md-right">{{ __('Nivel de Acceso') }}</label>
    <input id="level"
           type="number"
           class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}"
           name="level"
           min="1"
           step="1"
           value="{{ $area->level or old('level') }}"
           required autofocus>

    @if ($errors->has('level'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('level') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="parent_id" class="col-form-label text-md-right">{{ __('Area a la que reporta') }}</label>
    <select name="parent_id" id="parent_id" class="form-control {{ $errors->has('parent_id') ? ' is-invalid' : '' }}">
        @foreach ($parents as $parent)
            <option value="{{$area->parent_id}}" {{ old('parent_id',$parent->id) == $area->parent_id ?'selected':''}}>{{ $parent->name}}</option>
        @endforeach
    </select>

    @if ($errors->has('parent_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('parent_id') }}</strong>
        </span>
    @endif
</div>

