@extends('layouts.front')

@section('header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lista de Publicaciones
            <small>Indice</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Documents</a></li>
            <li class="active">Navigation</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">

            @foreach($posts as $post)
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="/adminlte/img/avatar5.png" alt="User Image">
                            <span class="username"><a href="#">{{$post->owner->name}}</a></span>
                            <span class="description">Publicacion compartida -  <span
                                        class="glyphicon glyphicon-time"></span> {{$post->published_at->toDayDateTimeString()}}</span>
                        </div>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 20px; margin-top: 0;">
                            <a href="{{route('posts.show',$post)}}">{{$post->title}}</a>
                        </div>

                        <div class="attachment-block clearfix">
                            <img class="attachment-img" src="/adminlte/img/pdf-icon.png" alt="Attachment Image">

                            <div class="attachment-pushed">

                                <div class="attachment-text">
                                    {!!$post->excerpt  !!}
                                    ... <a href="#">more</a>

                                </div>
                                <div class=" pull-right">
                                    <span class="glyphicon glyphicon-bookmark"></span>
                                    @foreach($post->categories  as $category)
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
                        @foreach($post->documents  as $document)
                            <div class="box-comment">
                                <!-- User image -->
                                <img class="img-circle img-sm" src="/adminlte/img/pdf-icon-download.png"
                                     alt="Pdf Imagen">
                                <div class="comment-text">
                                    <span class="username"><a href="{{$document->url}}" target="_blank">{{$document->name}}</a>
                                        <span class="text-muted pull-right">{{$document->updated_at->toFormattedDateString()}}</span>
                                    </span>
                                </div>
                                <!-- /.comment-text -->
                            </div>
                            <!-- /.box-comment -->
                        @endforeach
                    </div>
                    <div class="box-footer">
                        Agregar avatar para el usuario
                    </div>
                </div>

            @endforeach
                {{ $posts->links() }}
            <ul class="pager">
                <li class="previous"><a href="#">&larr; Previous</a></li>
                <li class="next"><a href="#">Next &rarr;</a></li>
            </ul>
        </div>

        <div class="col-md-4">
            @include('layouts.partials.front.sidebar')
        </div>
    </div>

@endsection
