@section('content')

<?php $route = Route::currentRouteAction(); ?>
<?php $action = substr(strstr($route, '@'), 1); ?>

<div class="container">
	<h1>{{ ucfirst($action) }} Video</h1>
	@if(Session::has('msg'))
	  <div class="alert alert-success ">
	    {{ Session::get('msg') }}
	  </div>
	@endif
	
	<div class="content">
		{{ Form::open(['url'=> 'admin/video/'.$action, 'class'=>'form-horizontal', 'role'=>'form']) }}
		@if ($action == 'update')
			{{ Form::hidden('id', $video->id) }}
		@endif

		<table>	
			<tr>
				<td width='100px'>{{ Form::label('title', 'Title') }}</td>
				<td>{{ Form::text('title', $video->title) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('link', 'Link') }}</td>
				<td>{{ Form::text('link', $video->link) }}</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('text', 'Text') }}</td>
				<td>{{ Form::text('text', $video->text) }}</td>
			</tr>
		</table>

		<br>
		@if ($action != 'view')	<!--create update-->
			{{ Form::submit(ucfirst($action).' Video') }}
		@endif
		{{ Form::button('Back', ['onclick'=>'history.back();']) }}		

		{{ Form::close() }}
</div>

</div>

@stop