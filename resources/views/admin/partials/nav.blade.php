<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Navegación</li>
  <!-- Optionally, you can add icons to the links -->
  <li {{ request()->is('admin') ? 'class=active' : '' }}>
    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a>
  </li>
  <li><a href="{{ route('pages.home') }}" target="_black" ><i class="fa fa-home"></i> Visitar Sitio</a></li>
  <li class="treeview {{ request()->is('admin/posts*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>

    <ul class="treeview-menu">

      <li {{ request()->is('admin/posts') ? 'class=active' : '' }}>
        <a href="{{ route('admin.posts.index') }}" ><i class="fa fa-eye"></i> Ver todas las entradas</a>
      </li>

      <li>
        @if (request()->is('admin/posts/*'))
          <a href="{{ route('admin.posts.index', '#create') }}" data-target="#myModal">
            <i class="fa fa-pencil"></i>
             Crear entrada
           </a>          
        @else
          <a href="#" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-pencil"></i>
             Crear entrada
           </a>
        @endif
      </li>


    </ul>
  </li>
</ul>