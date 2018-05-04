<div class="modal fade" id="myModalPost" tabindex="-1" role="dialog" aria-labelledby="createAreaLabel"
     aria-hidden="true">
    <form method="POST" action="{{ route('admin.posts.store','#create') }}">
        <div class="modal-dialog" role="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="createAreaLabel">Crear un area nueva</h4>
                </div>

                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-form-label text-md-right">{{ __('Titulo') }}</label>
                        <input id="title"
                               type="text"
                               class="form-control"
                               name="title"
                               value="{{ old('title') }}"
                               autofocus>
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
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