@section('content')

<h1>Supporter</h1>

{{HTML::link('admin/supporter/create', 'Create Supporter')}}
<br><br>

@if ($supporters->isEmpty())
	<p>No supporters</p>

@else
	<table class='dataTable'>
		<thead>
			<tr>
				<th>Company</th>
				<th>Img</th>
				<th>Logo</th>
				<th>Text</th>
			</tr>
		</thead>
		<tbody>
			@foreach($supporters as $v)
				<tr>
					<td>{{$v->company}}</td>
					<td>{{$v->image}}</td>
					<td>{{$v->logo}}</td>
					<td>{{$v->text}}</td>
				</tr>
			@endforeach
	</tbody>
	</table>
@endif

</div>

@stop