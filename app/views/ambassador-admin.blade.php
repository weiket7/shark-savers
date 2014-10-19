@section('content')

<h1>Ambassador</h1>

{{HTML::link('admin/ambassador/create', 'Create Ambassador')}}
<br><br>

@if ($ambassadors->isEmpty())
	<p> No ambassadors</p>

@else
	<table class='dataTable'>
		<thead>
			<tr>
				<th>Name1</th>
				<th>Name2</th>
				<th>Sub1</th>
				<th>Sub2</th>
				<th>Caption</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ambassadors as $g)
				<tr>
					<td>{{$g->name1}}</td>
					<td>{{$g->name2}}</td>
					<td>{{$g->sub1}}</td>
					<td>{{$g->sub2}}</td>
					<td>{{$g->image}}</td>
				</tr>
			@endforeach
	</tbody>
	</table>
@endif

</div>

@stop