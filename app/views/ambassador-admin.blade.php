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
				<th>Name1</th>
				<th>Name2</th>
				<th>Sub1</th>
				<th>Sub2</th>
				<th>Caption</th>
			</tr>
		</thead>
		<tbody>
			@foreach($grids as $g)
				<tr>
					<td>{{$g->type}}</td>
					<td>{{$g->name1}}</td>
					<td>{{$g->name2}}</td>
					<td>{{$g->sub1}}</td>
					<td>{{$g->sub2}}</td>
					<td>{{$g->caption}}</td>
				</tr>
			@endforeach
	</tbody>
	</table>
@endif

</div>

@stop