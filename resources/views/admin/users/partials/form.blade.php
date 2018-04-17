{{ csrf_field() }}

<div class="form-group">
    <label for="name" class="col-form-label text-md-right">{{ __('Nombre') }}</label>
    <input id="name"
           type="text"
           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
           name="name"
           value="{{ $user->name or old('name') }}"
           autofocus>

    @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="email" class="col-form-label text-md-right">{{ __('Email') }}</label>
    <input id="email"
           type="email"
           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
           name="email"
           value="{{ $user->email or old('email') }}"
           autofocus>

    @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>


<div class="form-group">
    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
    <input id="password"
           type="password"
           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
           name="password">

    @if ($errors->has('password'))
        <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
    @endif
</div>

<div class="form-group ">
    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirme el Password') }}</label>
    <input id="password-confirm"
           type="password"
           class="form-control"
           name="password_confirmation">
</div>

<div class="form-group">
    <label for="position" class="col-form-label text-md-right">{{ __('Puesto') }}</label>
    <input id="position"
           type="text"
           class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}"
           name="position"
           value="{{ $user->position or old('position') }}"
           autofocus>

    @if ($errors->has('position'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('position') }}</strong>
        </span>
    @endif
</div>


<div class="form-group">
    <label for="area_id" class="col-form-label text-md-right">{{ __('Area a la que pertenece') }}</label>
    <select name="area_id" id="area_id" class="form-control {{ $errors->has('area_id') ? ' is-invalid' : '' }}">
        @foreach ($areas as $area)
            <option value="{{$area->id}}"
                    {{ old('area_id',$area->id ) == $user->areas->pluck('pivot')->contains('area_id',$area->id) ? 'selected':''}}>
                {{ $area->name}}</option>
        @endforeach
    </select>

    @if ($errors->has('area_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('area_id') }}</strong>
        </span>
    @endif
</div>

