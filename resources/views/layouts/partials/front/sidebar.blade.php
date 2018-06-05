{{--{{$posts->take(5)}}--}}

<div class="well text-center">
    <p class="lead">
        Don't want to miss updates? Please click the below button!
    </p>
    <button class="btn btn-primary btn-lg">Subscribe to my feed</button>
</div>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Documentos recientes</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <ul class="products-list product-list-in-box">
            @foreach($posts->take(5) as $post)
                <li class="item">
                    <div class="product-img">
                        <a href="#"><i class="fa fa-check-circle fa-3x text-green"></i></a>
                        {{--<img src="/adminlte/img/pdf-check.png" alt="Product Image">--}}
                    </div>
                    <div class="product-info">
                        <a href="{{route('posts.show',$post)}}">
                            {{str_limit( $post->title ,20,'...') }}
                            <span class="label label-warning pull-right">{{$post->published_at->toDateString()}}</span>
                        </a>
                        <span class="product-description">
                          {{str_limit( strip_tags($post->excerpt) ,30,'...') }}
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="{{route('posts.index')}}" class="uppercase">Ver todos los Productos</a>
    </div>
    <!-- /.box-footer -->
</div>


    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Categorias</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                @foreach( $categories as $category)

                <li><a href="#"><i class="fa fa-clipboard"></i> {{$category->name}}
                        <span class="label label-primary pull-right">12</span></a></li>
                @endforeach
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /. box -->
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Departamentos</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                @foreach( $areas as $area)
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> {{$area->name}}
                    <span class="label label-primary pull-right">{{$area->posts->count()}}</span></a></li>
                @endforeach

            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
