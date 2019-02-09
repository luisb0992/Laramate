@extends('layouts.app')
@section('title','Usuarios - '.config('app.name'))
@section('header','Usuarios')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li><a href="{{route('users.index')}}" title="Usuarios"> Usuarios </a></li>
	  <li class="active">Agregar</li>
	</ol>
@endsection
@section('content')
		<!-- Formulario -->
		<div class="row">
			<div class="col-md-6 col-md-offset-3 fondo-formulario" >
				<form class="" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
					{{ method_field( 'POST' ) }}
					{{ csrf_field() }}

					<center>
					<h4 class="titulo-create">Agregar Usuario</h4>
					</center>
					<div class="form-group {{ $errors->has('name')?'has-error':'' }}">

						<label class="control-label" for="name">Nombre: *</label>
						<input id="name" class="form-control" type="text" name="name" value="{{ old('name')?old('name'):'' }}" placeholder="Nombre" required>
					</div>

					<div class="form-group {{ $errors->has('email')?'has-error':'' }}">
						<label class="control-label" for="email">Usuario: *</label>
						<input id="email" class="form-control" type="text" name="email" value="{{ old('email')?old('email'):'' }}" placeholder="Usuario" required>
					</div>

					<div class="form-group {{ $errors->has('email')?'has-error':'' }}">
						<label class="control-label" for="rol">Rol: *</label>
						<select name="rol_id" required="" class="form-control">
							<option value="">seleccione</option>
							@foreach($roles as $rol)
							<option value="{{ $rol->id }}">{{ $rol->rol }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group {{ $errors->has('departamento')?'has-error':'' }}">
						<label class="control-label" for="rol">Departamento: *</label>
						<select name="departamento" required="" class="form-control">
							<option value="">seleccione</option>
							<option value="Auditoria">Auditoria</option>
							<option value="Sala Situacional">Sala Situacional</option>
							<option value="Control y Seguimiento">Control y Seguimiento</option>
							<option value="Produccion">Produccion</option>
						</select>
					</div>

					<div class="form-group {{ $errors->has('password')?'has-error':'' }}">
						<label class="control-label" for="password">Contraseña: *</label>
						<input id="password" class="form-control" type="password" name="password" required>
					</div>

					<div class="form-group {{ $errors->has('password_confirmation')?'has-error':'' }}">
						<label class="control-label" for="password_confirmation">Verificar: *</label>
						<input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
					</div>

					@if (count($errors) > 0)
	          <div class="alert alert-danger alert-important">
		          <ul>
		            @foreach($errors->all() as $error)
		              <li>{{$error}}</li>
		            @endforeach
		          </ul>
	          </div>
	        @endif

					<div class="form-group text-right">
						<a class="btn btn-flat btn-default" href="{{route('users.index')}}"><i class="fa fa-reply"></i> Atras</a>
						<button class="btn btn-flat btn-primary" type="submit"><i class="fa fa-send"></i> Guardar</button>
					</div>
				</form>
			</div>
		</div>
@endsection
