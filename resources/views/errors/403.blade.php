@extends('admin.layout')

@section('content')

	<section class="pages container">
	<div class="page page-about text-center">
		<h1 class="text-capitalize">Acceso no autorizado...</h1>
		
		<p>No tienes autorización para ver esta página...</p>
		<p>Regresar a <a href="{{ route('admin.dashboard') }}">Inicio</a></p>
	</div>
</section>

@endsection