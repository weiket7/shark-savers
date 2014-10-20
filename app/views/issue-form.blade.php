@section('content')

<script src="{{asset('js/tinymce/tinymce.min.js') }}"></script>

<script type="text/javascript">
 
tinymce.init({
  selector: "textarea",

  plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste jbimages"
  ],

  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
	
  relative_urls: false
	
});
 
</script>

<?php $route = Route::currentRouteAction(); ?>
<?php $action = substr(strstr($route, '@'), 1); ?>

<div class="container">
	<h1>{{ ucfirst($action) }} Issue</h1>
	@if(Session::has('msg'))
	  <div class="alert alert-success ">
	    {{ Session::get('msg') }}
	  </div>
	@endif
	
	<div class="content">
		{{ Form::open(['url'=> 'admin/issue/'.$action, 'class'=>'form-horizontal', 'role'=>'form']) }}
		@if ($action == 'update')
			{{ Form::hidden('id', $issue->id) }}
		@endif

		<?php $status_arr = ['I'=>'In Progress', 'C'=>'Completed'] ?>
		<table>	
			<tr>
				<td width='100px'>{{ Form::label('status', 'Status') }}</td>
				<td>
					@foreach($status_arr as $key => $s) 
				  	<label class='radio-inline' for='{{$s}}'>
			  			@if ($key == $issue->status)
								{{ Form::radio('status', $key, true, array('id'=>$s)) }}
							@else
								{{ Form::radio('status', $key, false, array('id'=>$s)) }}
					  	@endif
					  	{{$s}}
					  </label>
			  	@endforeach
			  </td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('title', 'Title') }}</td>
				<td>{{ Form::text('title', $issue->title) }}</td>
			</tr>
			<tr style='vertical-align:top'>
				<td width='100px'>{{ Form::label('text', 'Text') }}</td>
				<td>{{ Form::textarea('text', $issue->text) }}</td>
			</tr>
		</table>

		{{ Form::submit(ucfirst($action).' Issue') }}
		{{ Form::button('Back', ['onclick'=>'history.back();']) }}		
	
		{{ Form::close() }}
</div>

</div>

@stop