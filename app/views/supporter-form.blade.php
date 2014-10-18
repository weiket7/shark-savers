@section('content')

<?php $route = Route::currentRouteAction(); ?>
<?php $action = substr(strstr($route, '@'), 1); ?>

<div class="container">
	<h1>{{ ucfirst($action) }} Supporter</h1>
	@if(Session::has('msg'))
	  <div class="alert alert-success ">
	    {{ Session::get('msg') }}
	  </div>
	@endif
	
	<div class="content">
		{{ Form::open(['url'=> 'admin/supporter/'.$action, 'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) }}
		@if ($action == 'update')
			{{ Form::hidden('id', $supporter->id) }}
		@endif

		<table>	
			<tr>
				<td width='100px'>{{ Form::label('company', 'Company') }}</td>
				<td>{{ Form::text('company', $supporter->company) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('image', 'Image') }}</td>
				<td>{{ Form::file('image', $supporter->image) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('logo', 'Logo') }}</td>
				<td>{{ Form::file('logo', $supporter->logo) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('text', 'Text') }}</td>
				<td>{{ Form::text('text', $supporter->text) }}</td>
			</tr>
		</table>

		<br>
		@if ($action != 'view')	<!--create update-->
			{{ Form::submit(ucfirst($action).' Supporter') }}
		@endif
		{{ Form::button('Back', ['onclick'=>'history.back();']) }}		

		{{ Form::close() }}
</div>

</div>

@stop