@extends('layouts.default')

@section('title')
@parent
: Ver usuario
@stop

@section('content')
	<div class="form-signin" style="padding:15px;background-color:#fff;border-radius:6px;">
		<fieldset>
			<legend>Usuarios</legend>
			<h2 class="form-signin-heading text-center">Detalle de usuario</h2>
			<div class="form-group">
				<label for="name">Nombre: </label>
				<span>{{{ $users->name }}}</span>
			</div>
			<div class="form-group">
				<label for="gender">Genero: </label>
				<span>{{{ $users->gender }}}</span>
			</div>
			<div class="form-group">
				<label for="company">Empresa: </label>
				<span>{{{ $users->company }}}</span>
			</div>
			<div class="form-group">
				<label for="email">Correo Electrónico: </label>
				<span>{{{ $users->email }}}</span>
			</div>
			<div class="form-group">
				<label for="phone">Teléfono: </label>
				<span>{{{ $users->phone }}}</span>
			</div>
			<div class="form-group">
				<label for="address">Dirección: </label>
				<span>{{{ $users->address }}}</span>
			</div>
			<div class="col-md-12" style="padding:10px;">
				{{ link_to_route('users.create', 'Nueva usuario', array(), array('class' => 'btn btn-primary')) }}
				{{ link_to_route('users.edit', 'Editar usuario', array($users->id), array('class' => 'btn btn-primary')) }}
			</div>
		</fieldset>
	</div>
@stop