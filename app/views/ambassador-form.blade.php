@section('content')

<?php $route = Route::currentRouteAction(); ?>
<?php $action = substr(strstr($route, '@'), 1); ?>

<div class="container">
	<h1>{{ ucfirst($action) }} Ambassador</h1>
	@if(Session::has('msg'))
	  <div class="alert alert-success ">
	    {{ Session::get('msg') }}
	  </div>
	@endif
	
	<div class="content">
		{{ Form::open(['url'=> 'admin/ambassador/'.$action, 'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) }}
		@if ($action == 'update')
			{{ Form::hidden('id', $ambassador->id) }}
		@endif

		<table>	
			<tr>
				<td width='100px'>{{ Form::label('name1', 'Name 1') }}</td>
				<td>{{ Form::text('name1', $ambassador->name1) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('name2', 'Name 2') }}</td>
				<td>{{ Form::text('name2', $ambassador->name2) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('sub1', 'Sub 1') }}</td>
				<td>{{ Form::text('sub1', $ambassador->sub1) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('sub2', 'Sub 2') }}</td>
				<td>{{ Form::text('sub2', $ambassador->sub2) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('image', 'Image') }}</td>
				<td>{{ Form::file('image', $ambassador->image) }}</td>
			</tr>
			
		</table>

		<br>
		@if ($action != 'view')	<!--create update-->
			{{ Form::submit(ucfirst($action).' Ambassador') }}
		@endif
		{{ Form::button('Back', ['onclick'=>'history.back();']) }}		

		{{ Form::close() }}
</div>

</div>

@stop