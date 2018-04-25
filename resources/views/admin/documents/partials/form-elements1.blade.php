<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title" class="col-form-label text-md-right">{{ __('Titulo') }}</label>
    <input id="title"
           type="text"
           class="form-control"
           name="title"
           value="{{ old('title',$document->title) }}"
           autofocus>
    @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('excerpt') ? ' has-error' : '' }}">
    <label for="excerpt" class="col-form-label text-md-right">{{ __('Extracto') }}</label>
    <textarea id="excerpt"
              name="excerpt"
              rows="8"
              class="form-control"
              placeholder="Ingresa un extracto de ls publicacion">
        {{old('excerpt',$document->excerpt)}}
    </textarea>

    @if ($errors->has('excerpt'))
        <span class="help-block">
            <strong>{{ $errors->first('excerpt') }}</strong>
        </span>
    @endif
</div>



{{--<div class="form-group {{ $errors->has('pdfbook') ? ' has-error' : '' }}">--}}
{{--<label for="pdfbook" class="col-form-label text-md-right">{{ __('Documento PDF') }}</label>--}}
{{--<input id="pdfbook"--}}
{{--type="file"--}}
{{--class="form-control"--}}
{{--name="pdfbook"--}}
{{--value="{{ old('pdfbook') }}"--}}
{{--autofocus>--}}

{{--@if ($errors->has('pdfbook'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('pdfbook') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}





