@section('content')

<?php $route = Route::currentRouteAction(); ?>
<?php $action = substr(strstr($route, '@'), 1); ?>

<div class="container">
	<h1>{{ ucfirst($action) }} Pledge</h1>
	@if(Session::has('msg'))
	  <div class="alert alert-success ">
	    {{ Session::get('msg') }}
	  </div>
	@endif
	
	<div class="content">
		{{ Form::open(['url'=> 'admin/pledge/'.$action, 'class'=>'form-horizontal', 'role'=>'form']) }}
		@if ($action == 'update')
			{{ Form::hidden('id', $pledge->id) }}
		@endif


		<table>	
			<tr>
				<td width='100px'>{{ Form::label('first_name', 'First Name') }}</td>
				<td>{{ Form::text('first_name', $pledge->first_name) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('last_name', 'Last Name') }}</td>
				<td>{{ Form::text('last_name', $pledge->last_name) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('nric', 'NRIC') }}</td>
				<td>{{ Form::text('nric', $pledge->nric) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('email', 'Email') }}</td>
				<td>{{ Form::text('email', $pledge->email) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('country', 'Country') }}</td>
				<td>{{ Form::text('country', $pledge->country) }}</td>
			</tr>
		</table>
		<br>

		{{ Form::submit(ucfirst($action).' Pledge') }}
		{{ Form::button('Back', ['onclick'=>'history.back();']) }}		

		{{ Form::close() }}
</div>

</div>

@stop