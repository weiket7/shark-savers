@section('content')

<h1>Slider</h1>

{{HTML::link('admin/slider/create', 'Create Slider')}} |  
{{HTML::link('admin/slider/order/landing', 'Landing Order')}}  | 
{{HTML::link('admin/slider/order/sg', 'SG Order')}}  | 
{{HTML::link('admin/slider/order/my', 'MY Order')}}  | 
{{HTML::link('admin/slider/order/hk', 'HK Order')}} 

<br><br>

{{ Form::open(['url'=> 'admin/slider', 'role'=>'form', 'files'=>true]) }}

<table class='table table-bordered'>
	<thead>
	<tr>
		<th></th>
		<th>Position</th>
		<th>Country</th>
		<th>Image</th>
	</tr>
	</thead>
	<tbody>
	<?php $country_arr = ['0'=>'Landing', '1'=>'SG', '2'=>'MY', '3'=>'HK'] ?>
	@foreach ($sliders as $key => $s)
		<tr>
			<td>{{link_to('admin/slider/update/'.$s->id, 'Update')}}</td>
			<td>{{$s->position}}</td>
			<td>{{$country_arr[$s->country]}}</td>
			<td>
				@if ($s->image != '')
					{{HTML::image('img/slider/'.$s->image, '', ['height'=>'100px'])}}
				@endif
			</td>
		</tr>
	@endforeach
	</tbody>
<tr>

</tr>
</table>
<br>

{{ Form::submit('Update') }}

{{ Form::close() }}

@stop