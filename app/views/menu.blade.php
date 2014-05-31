<nav id="header" class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="{{{ URL::to('') }}}">
			Tests
		</a>
	</div>
	<div class="collapse navbar-collapse" id="bs-navbar-collapse">		
		<ul class="nav navbar-nav">
			<li class="active"><a href="{{{ URL::to('') }}}">Inicio</a></li>
		</ul>
		<ul class="nav navbar-nav pull-right" style="padding-right:30px;">
			<li><a class="{{{ (Request::is('users') ? 'active' : '') }}}" href="{{{ URL::to('users') }}}">Ver usuarios</a></li>
			<li class="divider"></li>
			<li><a class="{{{ (Request::is('users/create') ? 'active' : '') }}}" href="{{{ URL::to('users/create') }}}">Agregar usuario</a></li>
			<li class="divider"></li>
		</ul>
	</div>
</nav>