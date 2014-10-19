@section('content')

<?php $route = Route::currentRouteAction(); ?>
<?php $action = substr(strstr($route, '@'), 1); ?>

<div class="container">
	<h1>{{ ucfirst($action) }} Grid</h1>
	@if(Session::has('msg'))
	  <div class="alert alert-success ">
	    {{ Session::get('msg') }}
	  </div>
	@endif
	
	<div class="content">
		{{ Form::open(['url'=> 'admin/grid/'.$action, 'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) }}
		@if ($action == 'update')
			{{ Form::hidden('id', $grid->id) }}
		@endif

		<table>	
			<tr>
				<td width='100px'>{{ Form::label('type', 'Type') }}</td>
				<td>
					<?php $type = [''=>'','V'=>'Video','A'=>'Ambassador','S'=>'Supporter']?>
					{{ Form::select('type', $type, $grid->type) }}
				</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('title', 'Title') }}</td>
				<td>{{ Form::text('title', $grid->title) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('link', 'Link') }}</td>
				<td>{{ Form::text('link', $grid->link) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('position', 'Position') }}</td>
				<td>{{ Form::text('position', $grid->position) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('image', 'Image') }}</td>
				<td>{{ Form::file('image', $grid->image) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('logo', 'Logo') }}</td>
				<td>{{ Form::file('logo', $grid->logo) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('caption', 'Caption') }}</td>
				<td>{{ Form::text('caption', $grid->caption) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('text', 'Text') }}</td>
				<td>{{ Form::textarea('text', $grid->text) }}</td>
			</tr>
		</table>

		<br>
		@if ($action != 'view')	<!--create update-->
			{{ Form::submit(ucfirst($action).' Grid') }}
		@endif
		{{ Form::button('Back', ['onclick'=>'history.back();']) }}		

		{{ Form::close() }}
</div>

</div>

@stop