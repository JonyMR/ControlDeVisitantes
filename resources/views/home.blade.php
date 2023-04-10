@extends('layouts.app')
@section('title', __('Control de visitas'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
			<div class="card-body">
				<h5>Hola <strong>{{ Auth::user()->name }},</strong> {{ __('Bienvenido al control de visitas.') }}</h5>
				</br> 
				<hr>
		</div>
	</div>
</div>
</div>
@endsection