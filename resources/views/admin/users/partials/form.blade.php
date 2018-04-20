{{ csrf_field() }}
<div class="col-md-6">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Editando Area: {{$user->name}}</h3>
        </div>
        <div class="box-body ">
            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-form-label text-md-right">{{ __('Nombre') }}</label>
                <input id="name"
                       type="text"
                       class="form-control "
                       name="name"
                       value="{{ $user->name or old('name') }}"
                       autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-form-label text-md-right">{{ __('Email') }}</label>
                <input id="email"
                       type="email"
                       class="form-control "
                       name="email"
                       value="{{ $user->email or old('email') }}"
                       autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                <input id="password"
                       type="password"
                       class="form-control"
                       name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group ">
                <label for="password-confirm"
                       class="col-form-label text-md-right">{{ __('Confirme el Password') }}</label>
                <input id="password-confirm"
                       type="password"
                       class="form-control"
                       name="password_confirmation">
            </div>

            <div class="form-group {{ $errors->has('position') ? ' has-error' : '' }}">
                <label for="position" class="col-form-label text-md-right">{{ __('Puesto') }}</label>
                <input id="position"
                       type="text"
                       class="form-control "
                       name="position"
                       value="{{ $user->position or old('position') }}"
                       autofocus>

                @if ($errors->has('position'))
                    <span class="help-block">
                        <strong>{{ $errors->first('position') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group {{ $errors->has('area_id') ? ' has-error' : '' }}">
                <label for="area_id" class="col-form-label text-md-right">{{ __('Area a la que pertenece') }}</label>
                <select name="area_id" id="area_id"
                        class="form-control ">
                    @foreach ($areas as $area)
                        <option value="{{$area->id}}"
                                {{ old('area_id',$area->id ) == $user->areas->pluck('pivot')->contains('area_id',$area->id) ? 'selected':''}}>
                            {{ $area->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('area_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('area_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Guardar informacion
                </button>
                <a href="{{route('users.index')}}" class="btn btn-danger">Retornar</a>
            </div>
        </div>
    </div>
</div>