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

		<div>
		  {{ Form::label('first_name', 'First Name', ['class'=>'col-sm-2 control-label']) }}
		  {{ Form::text('first_name', $pledge->first_name) }}
		</div>

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