@extends('layouts.default')

@section('title')
@parent
: Usuarios
@stop

@section('content')
	<div style="padding:35px;background-color:#fff;border-radius:6px;">
		<fieldset>
			<legend>Usuarios</legend>
			<div class="row">
				<div class="col-xs-6 col-md-6">
					{{ link_to_route('users.create', 'Nuevo usuario', array(), array('class' => 'btn btn-primary')) }}
				</div>
				<div class="col-xs-6 col-md-6">
					{{ Form::open(['url' => 'users', 'method' => 'GET', 'class' => 'navbar-form pull-right', 'role' => 'search']) }}
						<div class="{{{ $errors->has('q') ? 'error' : '' }}}">
							<label for="name">Buscar </label>
							<input type="text" id="q" name="q" class="form-control" placeholder="Por nombre..." value="{{{ Request::old('q') }}}" />
							{{{ $errors->first('q') }}}
						</div>
					{{ Form::close() }}
				</div>
			</div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Genero</td>
						<td>Empresa</td>
						<td>Email</td>
						<td>Phone</td>
						<th>Ver</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
				@foreach($users as $key => $value)
					<tr>
						<td>{{ $userId = $value->id }}</td>
						<td>{{{ $value->name }}}</td>
						<td>{{{ $value->gender }}}</td>
						<td>{{{ $value->company }}}</td>
						<td>{{{ $value->email }}}</td>
						<td>{{{ $value->phone }}}</td>
						<td>{{ link_to_route('users.show', 'Ver', array($userId), array('class' => 'btn btn-info')) }}</td>
						<td>{{ link_to_route('users.edit', 'Editar', array($userId), array('class' => 'btn btn-warning')) }}</td>
						<td>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $userId))) }}
							{{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</fieldset>
	</div>
@stop