@section('content')

<script type="text/javascript">
  $( document ).ready(function() {
		/*$("#val").validate({
		  rules: {
		    first_name: { required: true },
		    last_name: { required: true },
		    nric: { required: true },
		    email: { required: true },
		    country: { required: true },
		  },
		  messages: {
		    first_name: { required: "Please enter first name"},
		    last_name: { required: "Please enter last name" },
		    nric: { required: "Please enter NRIC"},
		    email: { required: "Please enter valid email"},
		    country: { required: "Please select country"},
		  }
		});*/

	});
</script>

I'm FINished with FINS<br>
你好<br>
<br>
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

<div style='color:red'>All fields are mandatory</div>
<br>

{{ Form::open(['id'=>'val', 'url'=> 'pledge', 'role'=>'form']) }}
	
<input type='text' name='first_name' id='first_name' placeholder='First Name' class='form-control'>
<br> 

<input type='text' name='last_name' id='last_name' placeholder='Last Name' class='form-control'> 
<br>	

<input type='text' name='nric' id='nric' placeholder='NRIC' class='form-control'> 
<br>	

<input type='text' name='email' id='email' placeholder='Email' class='form-control'> 
<br>	

<select name='country' id='country' class='form-control'>
	<option>Country</option>
	<option value='SG'>Singapore</option>
	<option value='HK'>Hong Kong</option>
	<option value='MY'>Malaysia</option>
</select>
<br>	
<br>

<input type='checkbox'> "I'm FINished with FINs and I will never eat or serve
shark fin soup again"
<br><br>

<input type='checkbox'> "I support ending the shark fin trade in my country and
ask my government to enact a ban on the shark fin trade"
<br><br>

<input type='submit' value='Pledge Now' class='btn btn-primary'>

{{ Form::close() }}

@stop