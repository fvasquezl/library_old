<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Navegaci&oacute;n</li>
    <!-- Optionally, you can add icons to the links -->
    <li><a href="{{route('posts.index')}}"><i class="fa fa-bookmark">
            </i> <span>Pagina de Inicio</span></a>
    </li>
    <li {{request()->is('admin') ? 'class=active' : ''}}>
        <a href="{{route('admin.dashboard')}}"><i class="fa fa-home">
            </i> <span>Control Panel</span></a>
    </li>
    <li class="treeview {{request()->is('admin/areas') || request()->is('admin/users') ? 'active' : ''}}">
        <a href="#"><i class="fa fa-dashboard"></i> <span>Administracion</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li {{request()->is('admin/areas') ? 'class=active' : ''}}>
                <a href="{{route('admin.areas.index')}}">Areas</a>
            </li>
            <li {{request()->is('admin/users') ? 'class=active' : ''}}>
                <a href="{{route('admin.users.index')}}">Usuarios</a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Publicaciones</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('admin.posts.index')}}">Todos las publicaciones</a></li>
            <li><a href="#" data-toggle="modal"
                   data-target="#myModalPost">
                    <span>Crear publicacion</span></a>
            </li>
        </ul>
    </li>
</ul>