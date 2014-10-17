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

{{HTML::image('img/im-finished.jpg')}}
<br><br>

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
<br><br>

@if(Session::has('msg'))
  <div class="alert alert-success ">
    {{ Session::get('msg') }}
  </div>
@endif

{{ Form::open(['id'=>'val', 'url'=> 'pledge', 'role'=>'form']) }}

<table>
	<tr>
		<td width='440px'>
			<input type='text' name='first_name' id='first_name' placeholder='First Name' class='form-control pledge-text'>
			<br><label for='first_name' generated='true' class='error'></label>
		</td>
		<td width='20px'>&nbsp;</td>
		<td width='440px'>
			<input type='text' name='last_name' id='last_name' placeholder='Last Name' class='form-control pledge-text'>
			<br><label for='last_name' generated='true' class='error'></label>			
		</td>
	</tr>
	<tr>
		<td>
			<input type='text' name='nric' id='nric' placeholder='NRIC' class='form-control pledge-text'>
			<br><label for='nric' generated='true' class='error'></label>
		</td>
		<td width='20px'>&nbsp;</td>		
		<td>
			<input type='text' name='email' id='email' placeholder='Email' class='form-control pledge-text'>
			<br><label for='email' generated='true' class='error'></label>			
		</td>
	</tr>
</table>
<br>

<select name='country' id='country' class='form-control'>
	<option>Country</option>
	<option value='SG'>Singapore</option>
	<option value='HK'>Hong Kong</option>
	<option value='MY'>Malaysia</option>
</select>
<br><label for='country' generated='true' class='error'></label>	
<br>

<input type='checkbox' id='finished' name='finished'> "I'm FINished with FINs and I will never eat or serve
shark fin soup again"
<br><label for='finished' generated='true' class='error'></label><br>

<input type='checkbox' id='support' name='support'> "I support ending the shark fin trade in my country and
ask my government to enact a ban on the shark fin trade"
<br><label for='support' generated='true' class='error'></label><br>

{{HTML::image('img/pledge-now.jpg', '', ['onclick'=>'submitForm()'])}}

{{ Form::close() }}

@stop