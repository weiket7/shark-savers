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
				<th>Position</th>
				<th>Image</th>
				<th>Logo</th>
				<th>Link</th>
			</tr>
		</thead>
		<tbody>
			<?php $type_arr = ['A'=>'Ambassador', 'S'=>'Supporter', 'V'=>'Video'] ?>
			@foreach($grids as $g)
				<tr>
					<td>{{$type_arr[$g->type]}}</td>
					<td>{{link_to('admin/grid/update/'.$g->id, $g->title) }}</td>
					<td>{{$g->position}}</td>
					<td>{{HTML::image('img/grid/'.$g->image, '', ['height'=>'40px'])}}</td>
					<td>
						@if ($g->logo != '')
							{{HTML::image('img/grid/'.$g->logo, '', ['height'=>'40px'])}}
						@endif
					</td>
					<td>
						@if ($g->link != '') 
							{{HTML::link('http://youtube.com/watch?v='.$g->link, 'Video', ['target'=>'_blank'])}}
						@endif
					</td>
				</tr>
			@endforeach
	</tbody>
	</table>
@endif

</div>

@stop