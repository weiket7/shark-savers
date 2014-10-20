@section('content')

<h1>Issue</h1>

{{HTML::link('admin/issue/create', 'Create Issue')}}
<br><br>

@if ($issues->isEmpty())
	<p> No issues</p>

@else
	<table class='dataTable'>
		<thead>
			<tr>
				<th>Status</th>
				<th>Title</th>
				<th>Text</th>
			</tr>
		</thead>
		<tbody>
			@foreach($issues as $p)
				<tr>
					<td>{{$p->status}}</td>
					<td>{{$p->title}}</td>
					<td>{{$p->text}}</td>
				</tr>
			@endforeach
	</tbody>
	</table>
@endif

</div>

@stop