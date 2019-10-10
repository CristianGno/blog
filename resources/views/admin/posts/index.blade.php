@extends('admin.layout')
  
  

@section('header')

      <h1>
        Todas las entradas
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><i class="fa fa-bars"></i> Posts</li>
      </ol>

@endsection


@section('content')
	   
      <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Listado de publicaciones</h3>
      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear Publicación</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="posts-table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Título de la entrada</th>
          <th>Extracto de la entrada</th>
          <th>Acciones</th>
        </tr>
        </thead>
		
		<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->excerpt }}</td>
					<td>
            <a target="_black" href="{{ route('posts.show', $post) }}" class="btn btn-xs btn-default"><i class="fa fa-eye" ></i></a>
						<a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>

            <form action="{{ route('admin.posts.destroy', $post) }}" style="display: inline" method="POST">
              {{ csrf_field() }} {{ method_field('DELETE') }}

              <button  class="btn btn-xs btn-danger"
                onclick="return confirm('¿Estás seguro que deseas eliminar esta entrada?');">
              <i class="fa fa-times"></i>
            </button>
            </form>
					</td>
				</tr>
			@endforeach
		</tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  @push('styles')
  	<link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  @endpush

  @push('scripts')
  
  	<script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

     <script>
	  $(function () {
	    $('#posts-table').DataTable({
	      'paging'      : true,
	      'lengthChange': false,
	      'searching'   : false,
	      'ordering'    : true,
	      'info'        : true,
	      'autoWidth'   : false
	    })
	  })
	</script>


  
  @endpush
@endsection
