@extends('layouts.app')
@section('title', __('Control de Visitas'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
            <div class="card-body">
              <h5>  
            @guest
				
				{{ __('Bienvenido al control de visitas.') }} </br>
				Inicia sesión o solicita tus credenciales de acceso con el encargado de sistemas.
                
			@else
					Hola {{ Auth::user()->name }}, Bienvenido al control de visitas
            @endif	
				</h5>
            </div>
        </div>
    </div>
</div>
@endsection