<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="createAreaLabel"
     aria-hidden="true">
    <form method="POST" action="{{ route('areas.store','#create') }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="createAreaLabel">Crear un area de trabajo nueva</h4>
                </div>

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-form-label text-md-right">{{ __('Nombre') }}</label>
                                <input id="name"
                                       type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{ old('name') }}"
                                       autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar sin guardar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
            </div>
        </div>
    </form>
</div>
@prepend('scripts')
    <script src="{{ asset('js/modal.js') }}" defer></script>
@endprepend