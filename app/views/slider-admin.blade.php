@section('content')

<h1>Slider</h1>

{{ Form::open(['url'=> 'admin/slider', 'role'=>'form', 'files'=>true]) }}

<table class='table table-bordered'>
<tr>
<th>#</th>
<th>Delete</th>
<th>Image</th>
<th>Upload</th>
</tr>
@for ($i=1; $i<=10; $i++)
	<tr>
		<td>
			{{$i}}
		</td>
		<td>
		<input type='checkbox' name='delete{{$i}}'>
		</td>
		<td>
			@if (isset($sliders[$i]) && $sliders[$i]['image'] != '')
				{{HTML::image('img/'.$sliders[$i]['image'], '', ['height'=>'100px'])}}
			@endif
		</td>
		<td>
			<input type='file' name='image{{$i}}'>
		</td>
	</tr>
@endfor
<tr>

</tr>
</table>
<br>

{{ Form::submit('Update') }}

{{ Form::close() }}

@stop