@section('content')

<script type="text/javascript" src="{{asset('/js/jquery-ui-timepicker-addon.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-ui-sliderAccess.js')}}"></script>

<script type="text/javascript">
var tracker = {};
$(function() {
  $("#sort tbody").sortable({
      helper: fixHelperModified,
      stop: updateIndex
  }).disableSelection();
});
   //http://stackoverflow.com/questions/13204871/jquery-sortable-keep-within-container-boundary
var fixHelperModified = function(e, tr) {
  var $originals = tr.children();
  var $helper = tr.clone();
  $helper.children().each(function(index) {
    $(this).width($originals.eq(index).width())
  });
  //alert();
  return $helper;
},
updateIndex = function(e, ui) {	
  $('td.index', ui.item.parent()).each(function (i) {
    var t = $(this).find("input[type='text']").val(i + 1);
    $(t).val(i + 1);
  });
};
</script>

<h1>Grid</h1>

@if ($grids->isEmpty())
	<p> No grids</p>

@else

	{{ Form::open(['url'=> 'admin/position', 'role'=>'form']) }}

	<table id='sort' class='table table-bordered'>
		<thead>
			<tr>
				<th>Type</th>
				<th>Title</th>
				<th>Position</th>
				<th>Country</th>
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
					<td class='index'><input type='text' name='grid{{$g->id}}' value='{{$g->position}}'></td>
					<td>{{implode(',', $g->country())}}</td>
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
	<br>
	
	{{ Form::submit('Update') }}	

	{{ Form::close() }}
@endif

</div>

@stop