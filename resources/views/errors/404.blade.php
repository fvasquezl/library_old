@extends('layouts.errors')

@section('header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Error
            <small>404</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Error</a></li>
            <li class="active">404</li>
        </ol>
    </section>
@endsection

@section('content')

<div class="error-page">
    <h2 class="headline text-yellow"> 404</h2>

    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Pagina no encontrada.</h3>

        <p>
            No hemos encontrado la pagina que estas buscando.
            Mientras tanto, puedes <a href="{{route('posts.index')}}"> regresar al area de posts</a> o trata de usar nuestra busqueda.
        </p>

        <form class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search">

                <div class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <!-- /.input-group -->
        </form>
    </div>
    <!-- /.error-content -->
</div>

@endsection