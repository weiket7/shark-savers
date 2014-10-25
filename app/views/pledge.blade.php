@section('content')

<script src="{{asset('js/jquery.validate.min.js') }}"></script>

<script type="text/javascript">
function submitForm() {
	$('#val').submit();
}

  $( document ).ready(function() {
  	$("#val").validate({
		  rules: {
		    first_name: { required: true },
		    last_name: { required: true },
		    nric: { required: true },
		    email: { required: true },
		    country: { required: true },
		    finished: { required: true },
		    support: { required: true },
		  },
		  messages: {
		    first_name: { required: "Please enter first name"},
		    last_name: { required: "Please enter last name" },
		    nric: { required: "Please enter NRIC"},
		    email: { required: "Please enter valid email"},
		    country: { required: "Please select country"},
		    finished: { required: "Please check the checkbox"},
		    support: { required: "Please check the checkbox"},
		  }
		});

	});
</script>

<div class='shark-repeat'>
<div class='container' style='text-align:center'>

	<div style='height:20px'>&nbsp;</div>

	{{HTML::image('img/im-finished-pledge.png')}}
	<br><br>

	<div class='hidden-xs hidden-sm' style='margin-bottom:20px'>
		Do you want to make a difference?<br>
		<br>
		A pledge is a highly personal statement that lets others know what you
		believe in, showing how you back up our convictions and beliefs. It is
		something you will stand up for, and resist social and peer pressures. It is
		something you wear as a badge and remain faithful to for life.
		<br><br>

		Your pledge will help us spread the message and encourage even more to
		follow. Take the pledge today and help us reach the goal of getting 100,000
		Singaporeans to also do the same. Together we can make a difference in
		Singapore, and in the world.
		<br>
	</div>

	@if(Session::has('msg'))
	  <div class="alert alert-success ">
	    {{ Session::get('msg') }}
	  </div>
	@endif

	<?php
	$url = explode('/',Request::path());
	$url_country = $url[0];
	?>
	{{ Form::open(['id'=>'val', 'url'=> $url_country.'/pledge', 'role'=>'form']) }}
	{{Form::hidden('url_country', $url_country)}}

	<div class='row'>
		<div class='col-md-6' style='height:60px'>
			<input type='text' name='first_name' id='first_name' placeholder='First Name' class='form-control pledge-textbox'>
			<label for='first_name' generated='true' class='error'></label>
		</div>
		<div class='col-md-6'>
			<input type='text' name='last_name' id='last_name' placeholder='Last Name' class='form-control pledge-textbox'>
				<label for='last_name' generated='true' class='error'></label>	
		</div>
	</div>

	<div class='row'>
		<div class='col-md-6' style='height:60px'>
				<input type='text' name='nric' id='nric' placeholder='NRIC' class='form-control pledge-textbox'>
				<label for='nric' generated='true' class='error'></label>
		</div>
		<div class='col-md-6'>
				<input type='text' name='email' id='email' placeholder='Email' class='form-control pledge-textbox'>
				<label for='email' generated='true' class='error'></label>
		</div>
	</div>

	<select name='country' id='country' class='form-control'>
		<option disabled selected>Country</option>
		<option value='SG'>Singapore</option>
		<option value='HK'>Hong Kong</option>
		<option value='MY'>Malaysia</option>
	</select>
	<br><label for='country' generated='true' class='error'></label>	
	<br>

	<!-- <div style='text-align:left'>
	<div style='margin-left:auto; margin-right:auto;'> -->
	<input type='checkbox' id='finished' name='finished'> "I'm FINished with FINs and I will never eat or serve
	shark fin soup again"
	<br><label for='finished' generated='true' class='error'></label><br>
	<!-- </div>
	</div> -->


	<input type='checkbox' id='support' name='support'> "I support ending the shark fin trade in my country and
	ask my government to enact a ban on the shark fin trade"
	<br><label for='support' generated='true' class='error'></label><br>
	<br>

	{{HTML::image('img/pledge-now2.jpg', '', ['onclick'=>'submitForm()'])}}

	{{ Form::close() }}
	
	<div style='height:50px'>&nbsp;</div>
</div>
</div> <!--end container-->


@stop