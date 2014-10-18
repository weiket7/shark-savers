@section('content')

<h1>Video</h1>

{{HTML::link('admin/video/create', 'Create Video')}}
<br><br>

@if ($videos->isEmpty())
	<p>No videos</p>

@else
	<table class='dataTable'>
		<thead>
			<tr>
				<th>Title</th>
				<th>Link</th>
				<th>Text</th>
			</tr>
		</thead>
		<tbody>
			@foreach($videos as $v)
				<tr>
					<td>{{$v->title}}</td>
					<td>{{$v->link}}</td>
					<td>{{$v->text}}</td>
				</tr>
			@endforeach
	</tbody>
	</table>
@endif

</div>

@stop