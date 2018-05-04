@extends('layouts.front')

@section('header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lista de Documentos
            <small>Indice</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Documents</a></li>
            <li class="active">Navigation</li>
        </ol>
    </section>
@endsection

@section('content')

    @foreach($documents as $document)
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="user-block">
                    <img class="img-circle" src="/adminlte/img/avatar5.png" alt="User Image">
                    <span class="username"><a href="#">{{$document->user->name}}</a></span>
                    <span class="description">Publicacion compartida -  <span class="glyphicon glyphicon-time"></span> {{$document->published_at->toDayDateTimeString()}}</span>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 20px; margin-top: 0;">
                    <a href="{{$document->url}}">{{$document->title}}</a>
                </div>

                <div class="attachment-block clearfix">
                    <img class="attachment-img" src="/adminlte/img/pdf-icon.png" alt="Attachment Image">

                    <div class="attachment-pushed">

                        <div class="attachment-text">
                            {!!$document->excerpt  !!}
                            ... <a href="#">more</a>

                        </div>
                        <div class=" pull-right">
                            <span class="glyphicon glyphicon-bookmark"></span>
                            @foreach($document->categories  as $category)
                                <a href="{{$category->url}}">{{$category->name}}</a>
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </div>
                        <!-- /.attachment-text -->
                    </div>
                    <!-- /.attachment-pushed -->
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
                @foreach($document->pdfs  as $pdf)
                <div class="box-comment">
                    <!-- User image -->
                    <img class="img-circle img-sm" src="/adminlte/img/pdf-icon-download.png" alt="Pdf Imagen">
                    <div class="comment-text">
                        <span class="username"><a href="{{$pdf->url}}" target="_blank">{{$pdf->document_id}}</a>
                        <span class="text-muted pull-right">{{$pdf->updated_at->toFormattedDateString()}}</span>
                        </span>
                    </div>
                    <!-- /.comment-text -->
                </div>
                <!-- /.box-comment -->
                @endforeach

            </div>
            <div class="box-footer">
                Aqui poner los departamentos a los que esta asignado el documento
                Agregar el titulo del documento a cada documento que se suba
                Cambiar todo a post ->documento en lugar de documento-pdf

                Agregar avatar para el usuario
            </div>
        </div>

    @endforeach

    <ul class="pager">
        <li class="previous"><a href="#">&larr; Previous</a></li>
        <li class="next"><a href="#">Next &rarr;</a></li>
    </ul>

@endsection
