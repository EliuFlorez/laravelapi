@if (count($errors->all()) > 0)
<div class="alert alert-error alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Error</h4>
	Por favor verifique los datos
	@foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<strong>Listo:</strong>
	@if(Session::get('success') == 'active-account')
		Su cuenta ha sido activada.
	@else
		{{{ $message }}}
	@endif
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<strong>Error:</strong>
	@if(Session::get('error') == 'unactive-account')
		Se produjo un error inesperado al activar su cuenta.
	@else
		{{{ $message }}}
	@endif
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<strong>Advertencia:</strong>
	{{{ $message }}}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<strong>Información:</strong>
	{{{ $message }}}
</div>
@endif
