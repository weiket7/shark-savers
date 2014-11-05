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
	hideAll();	
	<?php 
		if ($action == 'update') {
			echo "$('#type-tr').hide();\n";
			if ($grid->type == 'A') {
				echo "showAmbassador();\n";
			} else if ($grid->type == 'S') {
				echo "showSupporter();\n";
			} else if ($grid->type == 'V') {
				echo "showVideo();\n";
			}
		}
	?>
	$('#type').change(function () {
		hideAll();

		var type = $(this).val();
		if (type == 'A') {			
			showAmbassador();
		} else if (type == 'S') {
			showSupporter();
		} else if (type == 'V') {
			showVideo();
		}
	});

	$.validator.addMethod("roles", function(value, elem, param) {
    if($(".roles:checkbox:checked").length > 0){
	       return true;
	   }else {
	       return false;
	   }
	},"Select at least one");
	

});

//http://stackoverflow.com/questions/3035634/jquery-validate-check-at-least-one-checkbox
function submitForm() {
	if ($('#type').val() == 'A') {
		$('form').attr('id', 'ambassador-form');
		//alert();
		$("#ambassador-form").validate({
	    rules: {
	    	type: {required: true},
	      category: { required: true},
	      title: { required: true },
	      //image: { required: true },
	      "country[]": { required: true, minlength: 1}
	    },
	    messages: {
	    	type: {required: "Required"},
	      category: { required: "Required"},
	      title: { required: "Required" },
	      //image: { required: "Required"},
	      "country[]": { required: "Required"}
	    }
	  });

		$('#ambassador-form').submit();
	} else if ($('#type').val() == 'S') {
		$('form').attr('id', 'supporter-form');

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

		$('#supporter-form').submit();		
	} else {
		$('form').attr('id', 'video-form');

		$("#video-form").validate({
	    rules: {
	    	type: {required: true},
	      title: { required: true },
	      link: { required: true},
	      "country[]": { required: true, minlength: 1}
	    },
	    messages: {
	    	type: {required: "Required"},
	      title: { required: "Required" },
	      link: { required: "Required"},
	       "country[]": { required: "Required"}
	    }
	  });

		$('#video-form').submit();		
	}
}

function showAmbassador() {
	$('#title-tr').show();
	$('#category-tr').show();
	$('#image-tr').show();
	$('#delete-tr').show();
}

function showSupporter() {
	$('#title-tr').show();
	$('#image-tr').show();
	$('#logo-tr').show();
	$('#link-tr').show();
	$('#text-tr').show();
	$('#delete-tr').show();
}

function showVideo() {
	$('#title-tr').show();
	$('#link-tr').show();
	$('#image-tr').show();
	$('#delete-tr').show();
}

function hideAll() {
	$('.tr').each(function() {
		$(this).hide();
	});
}
</script>


<div class="container">
	<h1>{{ ucfirst($action) }} Grid</h1>
	@if(Session::has('msg'))
	  <div class="alert alert-success ">
	    {{ Session::get('msg') }}
	  </div>
	@endif
	
	<div class="content">
		{{ Form::open(['url'=> 'admin/grid/'.$action, 'id'=>'val', 'class'=>'form', 'role'=>'form', 'files'=>true]) }}
		@if ($action == 'update')
			{{ Form::hidden('id', $grid->id) }}
			{{ Form::hidden('position', $grid->position) }}
		@endif

		<table class='grid-admin' id='grid-admin'>	
			<tr id='type-tr'>
				<td width='100px'>{{ Form::label('type', 'Type') }}</td>
				<td>
					<?php $type_arr = [''=>null,'V'=>'Video','A'=>'Ambassador','S'=>'Supporter']?>
					{{ Form::select('type', $type_arr, $grid->type) }}
				</td>
			</tr>
			<tr>
				<td width='100px'>{{ Form::label('country', 'Country') }}</td>
				<td>
					<?php $country_arr = ['1'=>'Singapore','2'=>'Malaysia','3'=>'Hong Kong']?>
					@foreach($country_arr as $code => $country) 
		  			@if ($code == $grid->country)
							{{ Form::radio('country', $code, true, ['id'=>'country'.$code, 'class'=>'{country[]: true}']) }}
						@else
							{{ Form::radio('country', $code, false, ['id'=>'country'.$code]) }}
				  	@endif				  	
				  	<label for='country{{ $code }}'>{{ $country }}</label>&nbsp;
			  	@endforeach
		  		<label for='country' class='error' generated='true'>
				</td>
			</tr>
			<tr id='category-tr' class='tr'>
				<td width='100px'>{{ Form::label('category', 'Category') }}</td>
				<td>
					<?php $category = [ ''=>null,	
						'A'=>'Art & Design',
						'C'=>'Corporate',
						'E'=>'Entertainment',
						'M'=>'Media',
						'N'=>'NGO',
						'P'=>'Professional',
						'S'=>'Sport',
						'O'=>'Others']?>
					{{ Form::select('category', $category, $grid->category) }}
				</td>
			</tr>
			<tr id='title-tr' class='tr'>
				<td width='100px'>{{ Form::label('title', 'Title') }}</td>
				<td>{{ Form::text('title', $grid->title) }}</td>
			</tr>
			<tr id='link-tr' class='tr'>
				<td width='100px'>{{ Form::label('link', 'Link') }}</td>
				<td>
					{{ Form::text('link', $grid->link) }}
					@if ($grid->type == 'V')
					From https://www.youtube.com/watch?v=WYpTC4R7M3M<br>
					Just paste <b>WYpTC4R7M3M</b> here
					@endif
				</td>
			</tr>
			<tr id='image-tr' class='tr'>
				<td width='100px'>{{ Form::label('image', 'Image') }}</td>
				<td>
					<?php if ($grid->image != '') {
						echo HTML::image('img/grid/'.$grid->image, '', ['height'=>'150px']);
					} ?>
					{{ Form::file('image') }}
				</td>
			</tr>
			<tr id='logo-tr' class='tr'>
				<td width='100px'>{{ Form::label('logo', 'Logo') }}</td>
				<td>
					<?php if ($grid->logo != '') {
						echo HTML::image('img/grid/'.$grid->logo, '', ['height'=>'150px']);
					} ?>
					{{ Form::file('logo') }}
				</td>
			</tr>
			<tr id='caption-tr' class='tr'>
				<td width='100px'>{{ Form::label('caption', 'Caption') }}</td>
				<td>{{ Form::text('caption', $grid->caption) }}</td>
			</tr>
			<tr id='text-tr' class='tr'>
				<td width='100px'>{{ Form::label('text', 'Text') }}</td>
				<td>{{ Form::textarea('text', $grid->text) }}</td>
			</tr>
			<tr id='delete-tr' class='tr'>
				<td width='100px'>{{ Form::label('delete', 'Delete') }}</td>
				<td>{{ Form::checkbox('delete') }}</td>
			</tr>
		</table>

		<br>
		@if ($action != 'view')	<!--create update-->
			{{ Form::button(ucfirst($action).' Grid', ['onclick'=>'submitForm()']) }}
		@endif
		{{ Form::button('Back', ['onclick'=>'history.back();']) }}		

		{{ Form::close() }}
</div>

</div>

@stop

<?php
	/*if ($grid->type == 'A') {
		echo "$('#logo-tr').hide();
		$('#link-tr').hide();
		$('#text-tr').hide();";
	} else if ($grid->type == 'S') {
		echo "$('#link-tr').hide();
		$('#category-tr').hide();";
	} else if ($grid->type == 'V') {
		echo "$('#logo-tr').hide();
		$('#category-tr').hide();
		$('#text-tr').hide();";
	}*/
	?>