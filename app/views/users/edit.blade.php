@extends('layouts.default')

@section('title')
@parent
: Actualizar
@stop

@section('content')
	{{ Form::open(['route' => array('users.update', $users->id), 'method' => 'PUT', 'class' => 'form-style', 'autocomplete' => 'off']) }}
		<div style="padding:15px;background-color:#fff;border-radius:6px;">
			<fieldset>
				<legend>Actualizar usuario</legend>
				<div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
					<label for="name">Nombre <span style="color:red;">(*)</span></label>
					<input type="text" id="name" name="name" placeholder="Nombre.." required="true" autofocus="true" class="form-control" value="{{{ Request::old('name', $users->name) }}}" />
					{{{ $errors->first('name') }}}
				</div>
				<div class="form-group {{{ $errors->has('gender') ? 'error' : '' }}}">
					<label for="gender">Genero <span style="color:red;">(*)</span></label>
					{{ Form::select('gender', array('masculino'=>'Masculino', 'femenino'=>'Femenino', 'otro'=>'Otro'), Request::old('gender', $users->gender), array('class'=>'form-control', 'required'=>'true')) }}
					{{{ $errors->first('gender') }}}
				</div>
				<div class="form-group {{{ $errors->has('company') ? 'error' : '' }}}">
					<label for="company">Empresa <span style="color:red;">(*)</span></label>
					<input type="text" id="company" name="company" placeholder="Empresa.." required="true" autofocus="true" class="form-control" value="{{{ Request::old('company', $users->company) }}}" />
					{{{ $errors->first('company') }}}
				</div>
				<div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
					<label for="email">Correo Electrónico <span style="color:red;">(*)</span></label>
					<input type="email" id="email" name="email" placeholder="Correo Electrónico.." required="true" autofocus="true" class="form-control" value="{{{ Request::old('email', $users->email) }}}" />
					{{{ $errors->first('email') }}}
				</div>
				<div class="form-group {{{ $errors->has('phone') ? 'error' : '' }}}">
					<label for="phone">Teléfono <span style="color:red;">(*)</span></label>
					<input type="text" id="phone" name="phone" placeholder="Teléfono.." required="true" autofocus="true" class="form-control" value="{{{ Request::old('phone', $users->phone) }}}" />
					{{{ $errors->first('phone') }}}
				</div>
				<div class="form-group {{{ $errors->has('address') ? 'error' : '' }}}">
					<label for="address">Dirección <span style="color:red;">(*)</span></label>
					<textarea type="textarea" id="address" name="address" class="form-control">{{{ Request::old('address', $users->address) }}}</textarea>
					{{{ $errors->first('address') }}}
				</div>
				<button type="submit" class="btn btn-lg btn-primary btn-block">Actualizar</button>
			</fieldset>
		</div>
	{{ Form::close() }}
@stop