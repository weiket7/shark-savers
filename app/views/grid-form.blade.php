@section('content')

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
});

function showAmbassador() {
	$('#title-tr').show();
	$('#category-tr').show();
	$('#image-tr').show();
}

function showSupporter() {
	$('#title-tr').show();
	$('#image-tr').show();
	$('#logo-tr').show();
	$('#link-tr').show();
	$('#text-tr').show();
}

function showVideo() {
	$('#title-tr').show();
	$('#link-tr').show();
	$('#image-tr').show();
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
		{{ Form::open(['url'=> 'admin/grid/'.$action, 'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) }}
		@if ($action == 'update')
			{{ Form::hidden('id', $grid->id) }}
			{{ Form::hidden('position', $grid->position) }}
		@endif

		<table class='grid-admin' id='grid-admin'>	
			<tr id='type-tr'>
				<td width='100px'>{{ Form::label('type', 'Type') }}</td>
				<td>
					<?php $type = [''=>'','V'=>'Video','A'=>'Ambassador','S'=>'Supporter']?>
					{{ Form::select('type', $type, $grid->type) }}
				</td>
			</tr>
			<tr id='category-tr' class='tr'>
				<td width='100px'>{{ Form::label('category', 'Category') }}</td>
				<td>
					<?php $category = [''=>'','A'=>'Artiste','E'=>'Entertainment','C'=>'Corporate', 'M'=>'Musician', 'O'=>'Others']?>
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