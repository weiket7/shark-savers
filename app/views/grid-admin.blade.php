@section('content')

<h1>Grid</h1>

{{HTML::link('admin/grid/create', 'Create Grid')}}
<br><br>

@if(Session::has('msg'))
  <div class="alert alert-success ">
    {{ Session::get('msg') }}
  </div>
@endif

@if ($grids->isEmpty())
	<p> No grids</p>

@else
	<table class='dataTable'>
		<thead>
			<tr>
				<th>Type</th>
				<th>Title</th>
				<th>Category</th>
				<th>Position</th>
				<th>Country</th>
				<th>Image</th>
				<th>Logo</th>
				<th>Link</th>
			</tr>
		</thead>
		<tbody>
			<?php $type_arr = ['A'=>'Ambassador', 'S'=>'Supporter', 'V'=>'Video'] ?>
			<?php $country_arr = [''=>'','1'=>'SG', '2'=>'MY', '3'=>'HK'] ?>
			<?php $category_arr = [ ''=>null,	'A'=>'Art & Design', 'C'=>'Corporate', 'E'=>'Entertainment', 'M'=>'Media',
						'N'=>'NGO', 'P'=>'Professional', 'S'=>'Sport', 'O'=>'Others'] ?>
			@foreach($grids as $g)
				<tr>
					<td>{{$type_arr[$g->type]}}</td>
					<td>{{link_to('admin/grid/update/'.$g->id, $g->title) }}</td>
					<td>{{$category_arr[$g->category]}}</td>
					<td>{{$g->position}}</td>
					<td>							
						@foreach($g->country() as $key => $c)
							{{ $country_arr[$c] }}
						@endforeach
					</td>
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