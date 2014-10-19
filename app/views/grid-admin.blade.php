@section('content')

<h1>Grid</h1>

{{HTML::link('admin/grid/create', 'Create Grid')}}
<br><br>

@if ($grids->isEmpty())
	<p> No grids</p>

@else
	<table class='dataTable'>
		<thead>
			<tr>
				<th>Type</th>
				<th>Title</th>
				<th>Link</th>
				<th>Position</th>
				<th>Caption</th>
				<th>Image</th>
				<th>Logo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($grids as $g)
				<tr>
					<td>{{$g->type}}</td>
					<td>{{$g->title}}</td>
					<td>{{$g->link}}</td>
					<td>{{$g->position}}</td>
					<td>{{$g->caption}}</td>
					<td>{{$g->image}}</td>
					<td>{{$g->logo}}</td>
				</tr>
			@endforeach
	</tbody>
	</table>
@endif

</div>

@stop