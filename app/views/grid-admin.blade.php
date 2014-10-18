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
				<th>Image</th>
				<th>Caption</th>
			</tr>
		</thead>
		<tbody>
			@foreach($grids as $g)
				<tr>
					<td>{{$g->type}}</td>
					<td>{{$g->image}}</td>
					<td>{{$g->caption}}</td>
				</tr>
			@endforeach
	</tbody>
	</table>
@endif

</div>

@stop