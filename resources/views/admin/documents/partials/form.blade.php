{{ csrf_field() }}
<div class="col-md-6">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Creacion de documentos</h3>
        </div>
        <div class="box-body">
            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="title" class="col-form-label text-md-right">{{ __('Titulo') }}</label>
                <input id="title"
                       type="text"
                       class="form-control"
                       name="title"
                       value="{{ old('title') }}"
                       required autofocus>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group {{ $errors->has('excerpt') ? ' has-error' : '' }}">
                <label for="excerpt" class="col-form-label text-md-right">{{ __('Extracto') }}</label>
                <input id="excerpt"
                       type="text"
                       class="form-control"
                       name="excerpt"
                       value="{{ old('excerpt') }}"
                       required autofocus>

                @if ($errors->has('excerpt'))
                    <span class="help-block">
                        <strong>{{ $errors->first('excerpt') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group {{ $errors->has('pdfbook') ? ' has-error' : '' }}">
                <label for="pdfbook" class="col-form-label text-md-right">{{ __('Documento PDF') }}</label>
                <input id="pdfbook"
                       type="file"
                       class="form-control"
                       name="pdfbook"
                       value="{{ old('pdfbook') }}"
                       autofocus>

                @if ($errors->has('pdfbook'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pdfbook') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                <label for="category_id" class="col-form-label text-md-right">{{ __('Categoria') }}</label>
                <select name="category_id" id="category_id"
                        class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ old('category_id',$category->id) }}">{{$category->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Guardar informacion
                </button>
                <a href="{{route('documents.index')}}" class="btn btn-danger">Retornar</a>
            </div>
        </div>
    </div>
</div>
