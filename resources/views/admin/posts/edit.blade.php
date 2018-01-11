@extends('admin.layout')

@section('header')

      <h1>
        Posts
        <small>Crear una publicación</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class=""><a href="{{ route('admin.posts.index') }}"><i class="fa fa-bars"></i> Posts</a>
        <li class="active">Crear</li>
      </ol>

@endsection

@section('content')

	<div class="row">
<!--IMAGENES DE LOS POSTS-->
@if ($post->photos->count())
	   <div class="col-md-12">
	   	
	   	<div class="box box-primary">
	   		<div class="box-body">
	   			<h3>Imagénes de las entradas</h3>
				<div id="images-posts" class="row">
				    @foreach ($post->photos as $photo)
				     <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
				     	{{ method_field('DELETE') }} {{ csrf_field() }}
				       <div class="col-md-2">
					      <button class="btn btn-xs btn-danger" style="position: absolute;">
					          <i class="fa fa-remove"></i>
					      </button>
				            <img class="img-responsive" style="padding-bottom: 3px;" src="/storage/{{ $photo->url_image }}" alt="">
				        </div>
				     </form>
				    @endforeach
				</div><!--/#images-posts-->
	   		</div>
	   	</div>
	   </div>
<!--IMAGENES DE LOS POSTS-->
@endif
	  <form method="POST" action="{{ route('admin.posts.update', $post) }}">
	  	{{ csrf_field() }} {{ method_field('PUT') }}
		<div class="col-md-8">
			<div class="box box-primary">
			    <div class="box-header">
			      <h3 class="box-title">Crear entrada</h3>
			      <small>
			      	<a target="_blank" href="{{ route('posts.show', $post->url) }}">
			      		Ver entrada
			      	</a>
			      </small>
			    </div>

			    
			    	<div class="box-body">
			    		<div class="form-group   {{ $errors->has('title') ? 'has-error' : '' }}">
			    			<label for="">Título de la entrada</label>
			    			<input name="title" class="form-control" placeholder="Ingresa el título de la publicación" value="{{ old('title', $post->title) }}"></input>
			    			{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
			    		</div>
						
			    		

			    		<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
			    			<label for="">Contenido completo de la publicación</label>
			    			<textarea id="editor" name="body" class="form-control" rows="10" value="">
			    				{{ old('body', $post->body) }}
			    			</textarea>
			    			{!! $errors->first('body', '<span class="help-block">:message</span>') !!}
			    		</div>

			    		<div class="form-group {{ $errors->has('iframe') ? 'has-error' : '' }}">
			    			<label for="">Contenido embebido de la publicación (Audio o vídeo)</label>
			    			<textarea id="" name="iframe" class="form-control" rows="2" value="">
			    				{{ old('iframe', $post->iframe) }}
			    			</textarea>
			    			{!! $errors->first('iframe', '<span class="help-block">:message</span>') !!}
			    		</div>


			   </div><!--/.box-body-->
			</div>

		  </div>

		  <div class="col-md-4">
		  	<div class="box box-primary">
		  		<div class="box-body">

	             <div class="form-group">
	                <label>Fecha de publicación:</label>

	                <div class="input-group date">
	                  <div class="input-group-addon">
	                    <i class="fa fa-calendar"></i>
	                  </div>
	                  <input type="text" name="published_at" class="form-control pull-right" id="datepicker" value="{{ old('published_at', $post->published_at != null ? $post->published_at->format('m/d/Y') : '') }}">
	                </div>
	                <!-- /.input group -->
	              </div>
	              <!-- /.form group -->

	              <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
	              	<label for="">Categoría</label>
	              	<select class="form-control select2" name="category_id">
	              		<option value="">Seleccione una categoría</option>
	              		@foreach ($categories as $category)
							<option value="{{ $category->id }}"
								{{ old('category_id', $category->id) == $category->id ? 'selected' : '' }}

								>{{ $category->name }}
							</option>
	              		@endforeach
	              				
	              	</select>
	              	{!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
	              </div>

	              <div class="form-group">
	                <label>Etiquetas</label>
	                <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona una o más etiquetas"
	                        style="width: 100%;">
	                  @forelse ($tags as $tag)
						<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
	                  @endforeach
	                </select>
	              </div>

			  	
		  			<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
	    			  <label for="">Extracto de la publicación</label>
	    			  <textarea name="excerpt" class="form-control">{{ old('excerpt', $post->excerpt) }}</textarea>
	    			  {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
			    	</div>

			    	<div class="form-group">
	    			   <div class="dropzone">
	    			   </div>
			    	</div>

			    	<div class="form-group">
			    		<button type="submit" class="btn btn-block btn-primary">Guardar publicación</button>
			    	</div>
			  	</div>
			   </div>
		  	</div>
		  </div>
	   </form>



	</div>
	  <!-- bootstrap datepicker -->

@push('styles')
	<link rel="stylesheet" href="/css/dropzone-5.1.0.min.css">
	<link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
	
@endpush
  

@push('scripts')
	<script type="text/javascript" src="/js/dropzone-5.1.0.min.js"></script>
	<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
	<script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
	



		<script type="text/javascript">
		$('#datepicker').datepicker({
	      autoclose: true
	    });
	    CKEDITOR.replace('editor');
	    CKEDITOR.config.height = 270;

	    //Dropzone para imágenes
	    var myDropzone = new Dropzone('.dropzone', {
	    	url: '/admin/posts/{{ $post->url }}/photos',
	    	acceptedFiles: 'image/*',
	    	maxFilesize: 2,
	    	paramName: 'photo',
	    	headers: {
	    		'X-CSRF-TOKEN': '{{ csrf_token() }}'
	    	},
	    	dictDefaultMessage: "Arrastra aquí las imagenes para subirlas",
	    });

	    myDropzone.on('error', function(file, res){
	    	var msg = res.errors.photo[0];
	    	$('.dz-error-message:last > span').text(msg);
	    });

	    Dropzone.autoDiscover = false;

	//Initialize Select2 Elements
    $('.select2').select2({
    	'tags': true,
    });
	</script>
@endpush
@endsection