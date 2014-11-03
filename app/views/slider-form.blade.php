@section('content')

<script src="{{asset('js/jquery.validate.min.js') }}"></script>

<?php $route = Route::currentRouteAction(); ?>
<?php $action = substr(strstr($route, '@'), 1); ?>
<style type="text/css">
.grid-admin td {
  vertical-align: top;
}
</style>

<script type="text/javascript">
$(document).ready( function() {		
	$("#supporter-form").validate({
    rules: {
    	type: {required: true},
      title: { required: true },
      /*link: { required: true},*/
      "country[]": { required: true, minlength: 1}
    },
    messages: {
    	type: {required: "Required"},
      title: { required: "Required" },
      /*link: { required: "Required"},*/
       "country[]": { required: "Required"}
    }
  });

});
</script>


<div class="container">
	<h1>{{ ucfirst($action) }} Slider</h1>
	@if(Session::has('msg'))
	  <div class="alert alert-success ">
	    {{ Session::get('msg') }}
	  </div>
	@endif
	
	<div class="content">
		{{ Form::open(['url'=> 'admin/slider/'.$action, 'id'=>'val', 'class'=>'form', 'role'=>'form', 'files'=>true]) }}
		@if ($action == 'update')
			{{ Form::hidden('id', $slider->id) }}
			{{ Form::hidden('position', $slider->position) }}
		@endif

		<table class='grid-admin' id='grid-admin'>	
			<tr>
				<td width='100px'>{{ Form::label('country', 'Country') }}</td>
				<td>
					{{ Form::select('country', $country_arr, $slider->country) }}
				</td>
			</tr>
			<tr>
			<tr>
				<td>Image</td>
				<td>
					<?php if ($slider->image != '') {
						echo HTML::image('img/slider/'.$slider->image, '', ['height'=>'150px']);
					} ?>
					{{ Form::file('image') }}
				</td>
			</tr>
			<tr id='delete-tr' class='tr'>
				<td width='100px'>{{ Form::label('delete', 'Delete') }}</td>
				<td>{{ Form::checkbox('delete') }}</td>
			</tr>
		</table>

		<br>
		@if ($action != 'view')	<!--create update-->
			{{ Form::submit(ucfirst($action).' Slider') }}
		@endif
		{{ Form::button('Back', ['onclick'=>'history.back();']) }}		

		{{ Form::close() }}
</div>

</div>

@stop
