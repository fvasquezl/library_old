<div class="form-group">
    <label>Fecha de publicaci&oacute;n:</label>
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input name="published_at"
               class="form-control pull-right"
               id="datepicker"
               value="{{old('published_at',$document->published_at ? $document->published_at->format('m/d/Y'):null)}}">
    </div>
</div>

<div class="form-group {{ $errors->has('categories') ? ' has-error' : '' }}">
    <label for="categories" class="col-form-label text-md-right">Categor&iacute;as</label>
    <select name="categories[]"
            class="form-control select2"
            multiple>
        @foreach ($categories as $category)
            <option {{collect(old('categories',$document->categories->pluck('id')))->contains($category->id) ? 'selected' : '' }}
                    value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    @if ($errors->has('categories'))
        <span class="help-block">
            <strong>{{ $errors->first('categories') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="areas" class="col-form-label text-md-right">Areas</label>
    <select name="areas[]"
            class="form-control select2"
            multiple>
        @foreach ($areas as $area)
            <option {{collect(old('areas',$document->areas->pluck('id')))->contains($area->id) ? 'selected' : '' }}
                    value="{{$area->id}}">{{$area->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="myDropzone" class="col-form-label text-md-right">{{ __('Documento Pdf') }}</label>
    <div class="dropzone"></div>
</div>

<div class="form-group">
    <button type="submit" id="submit-all" class="btn btn-primary btn-block">
        Guardar documento
    </button>
</div>