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
		{{ Form::open(['url'=> 'pledge/'.$action, 'class'=>'form-horizontal', 'role'=>'form']) }}
		@if ($action == 'update')
			{{ Form::hidden('id', $pledge->id) }}
		@endif


		<table>	
			<tr>
				<td width='100px'>{{ Form::label('first_name', 'First Name') }}</td>
				<td>{{ Form::text('first_name', $pledge->first_name) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('first_name', 'First Name') }}</td>
				<td>{{ Form::text('first_name', $pledge->first_name) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('first_name', 'First Name') }}</td>
				<td>{{ Form::text('first_name', $pledge->first_name) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('first_name', 'First Name') }}</td>
				<td>{{ Form::text('first_name', $pledge->first_name) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('first_name', 'First Name') }}</td>
				<td>{{ Form::text('first_name', $pledge->first_name) }}</td>
			</tr>
		</table>

		<div>
			<span class='col-sm-2'></span>
			@if ($action != 'view')	<!--create update-->
				{{ Form::submit(ucfirst($action).' Project') }}
			@endif
			{{ Form::button('Back', ['onclick'=>'history.back();']) }}		
		</div>

		{{ Form::close() }}
</div>

</div>

@stop