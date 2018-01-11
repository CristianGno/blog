@extends('layout')

@section('content')

	<section class="pages container">
	<div class="page page-about text-center">
		<h1 class="text-capitalize">Página n o encontrada</h1>
		
		<p>La página que buscas no se encuentra.</p>
		<p>Regresar a <a href="{{ route('pages.home') }}">Inicio</a></p>
	</div>
</section>

@endsection