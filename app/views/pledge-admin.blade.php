@section('content')

<h1>Pledge</h1>

{{HTML::link('admin/pledge/create', 'Create Pledge')}}
<br><br>

@if ($pledges->isEmpty())
	<p> No pledges</p>

@else
	<table class='dataTable'>
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>email</th>
				<th>NRIC</th>
				<th>Country</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pledges as $p)
				<tr>
					<td>{{$p->first_name}}</td>
					<td>{{$p->last_name}}</td>
					<td>{{$p->email}}</td>
					<td>{{$p->nric}}</td>
					<td>{{$p->country}}</td>
				</tr>
			@endforeach
	</tbody>
	</table>
@endif

</div>

@stop