@section('content')

<script src="{{asset('js/jquery.validate.min.js') }}"></script>

<script type="text/javascript">
	function submitForm() {
		$('#val').submit();
	}

  $( document ).ready(function() {
  	$.validator.addMethod("exist", function(value, element) {
	    var email = $('#email').val();
	    $.ajax({
	      url: "{{URL::to('exist/"+email+"')}}",
	      error: function (xhr, ajaxOptions, thrownError) { alert(xhr.status + " " + thrownError); },
	      async: false
	    }).done(function(data) {
	    	//true = exist, evaluate to false
	      response = ( data == 'true' ) ? false : true;
	    });
	    return response;
	  });

  	$("#val").validate({
		  rules: {
		    first_name: { required: true },
		    last_name: { required: true },
		    //nric: { required: true, exist: true},
		    email: { required: true, exist: true },
		    country: { required: true },
		    finished: { required: true },
		    support: { required: true },
		  },
		  messages: {
		    first_name: { required: "Please enter first name"},
		    last_name: { required: "Please enter last name" },
		    //nric: { required: "Please enter NRIC", exist: "The NRIC has already pledged"},
		    email: { required: "Please enter valid email", exist: "The email has already pledged"},
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

	<?php
	$url = explode('/',Request::path());
	$country = $url[0];
	$country_arr = array('SG'=>'Singapore', 'MY'=>'Malaysia', 'HK'=>'Hong Kong');
	?>
	@if ($country == 'hk')
		{{HTML::image('img/im-finished-hk.png')}}
	@else
		{{HTML::image('img/im-finished-sgmy.png')}}
	@endif
	<br><br>

	<div class='hidden-xs hidden-sm' style='margin-bottom:20px'>
		Do you want to make a difference?<br>
		<br>
		A pledge is a highly personal statement that lets others know what you
		believe in, showing how you back up our convictions and beliefs. It is
		something you will stand up for, and resist social and peer pressures. It is
		something you wear as a badge and remain faithful to for life.
		<br><br>

		@if($country == 'sg') 
Your pledge will help us spread the message and encourage even more to
		follow. Take the pledge today and help us reach the goal of getting 100,000
		Singaporeans to also do the same. Together we can make a difference in Singapore,
		and in the world.
		@elseif($country == 'my')
Your pledge will help us spread the message and encourage even more to
		follow. Take the pledge today and help us reach the goal of getting 100,000
		Malaysians to also do the same. Together we can make a difference in Malaysia,
		and in the world.
		@elseif($country == 'hk')
		Your pledge will help us spread the message and encourage even more to
		follow. Take the pledge today and help us reach the goal of getting 100,000
		Hong Kongese to also do the same. Together we can make a difference in Hong Kong,
		and in the world.
		@endif
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
		<div class='col-md-6' style='height:100px'>
				<input type='text' name='nric' id='nric' placeholder='NRIC' class='form-control pledge-textbox'>
				<small>Governments care about the concerns of voters and citizens. By entering your NRIC, we will be able to convey these concerns convincingly.</small>
				<label for='nric' generated='true' class='error'></label><br>
		</div>
		<div class='col-md-6'>
				<input type='text' name='email' id='email' placeholder='Email' class='form-control pledge-textbox'>
				<label for='email' generated='true' class='error'></label>
		</div>
	</div>

	<select name='country' id='country' class='form-control'>
		<option disabled selected>Country</option>
		<option value="Singapore">Singapore</option>
		<option value="Hong Kong">Hong Kong</option>
		<option value="Malaysia">Malaysia</option>
		<option disabled>-----</option>
		<option value="Afghanistan">Afghanistan</option>
		<option value="Aland Islands">Aland Islands</option>
		<option value="Albania">Albania</option>
		<option value="Algeria">Algeria</option>
		<option value="American Samoa">American Samoa</option>
		<option value="Andorra">Andorra</option>
		<option value="Angola">Angola</option>
		<option value="Anguilla">Anguilla</option>
		<option value="Antarctica">Antarctica</option>
		<option value="Antigua and Barbuda">Antigua and Barbuda</option>
		<option value="Argentina">Argentina</option>
		<option value="Armenia">Armenia</option>
		<option value="Aruba">Aruba</option>
		<option value="Australia">Australia</option>
		<option value="Austria">Austria</option>
		<option value="Azerbaijan">Azerbaijan</option>
		<option value="Bahamas">Bahamas</option>
		<option value="Bahrain">Bahrain</option>
		<option value="Bangladesh">Bangladesh</option>
		<option value="Barbados">Barbados</option>
		<option value="Belarus">Belarus</option>
		<option value="Belgium">Belgium</option>
		<option value="Belize">Belize</option>
		<option value="Benin">Benin</option>
		<option value="Bermuda">Bermuda</option>
		<option value="Bhutan">Bhutan</option>
		<option value="Bolivia">Bolivia</option>
		<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
		<option value="Botswana">Botswana</option>
		<option value="Bouvet Island">Bouvet Island</option>
		<option value="Brazil">Brazil</option>
		<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
		<option value="Brunei Darussalam">Brunei Darussalam</option>
		<option value="Bulgaria">Bulgaria</option>
		<option value="Burkina Faso">Burkina Faso</option>
		<option value="Burundi">Burundi</option>
		<option value="Cambodia">Cambodia</option>
		<option value="Cameroon">Cameroon</option>
		<option value="Canada">Canada</option>
		<option value="Cape Verde">Cape Verde</option>
		<option value="Cayman Islands">Cayman Islands</option>
		<option value="Central African Republic">Central African Republic</option>
		<option value="Chad">Chad</option>
		<option value="Chile">Chile</option>
		<option value="China">China</option>
		<option value="Christmas Island">Christmas Island</option>
		<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
		<option value="Colombia">Colombia</option>
		<option value="Comoros">Comoros</option>
		<option value="Congo">Congo</option>
		<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
		<option value="Cook Islands">Cook Islands</option>
		<option value="Costa Rica">Costa Rica</option>
		<option value="Cote D'ivoire">Cote D'ivoire</option>
		<option value="Croatia">Croatia</option>
		<option value="Cuba">Cuba</option>
		<option value="Cyprus">Cyprus</option>
		<option value="Czech Republic">Czech Republic</option>
		<option value="Denmark">Denmark</option>
		<option value="Djibouti">Djibouti</option>
		<option value="Dominica">Dominica</option>
		<option value="Dominican Republic">Dominican Republic</option>
		<option value="Ecuador">Ecuador</option>
		<option value="Egypt">Egypt</option>
		<option value="El Salvador">El Salvador</option>
		<option value="Equatorial Guinea">Equatorial Guinea</option>
		<option value="Eritrea">Eritrea</option>
		<option value="Estonia">Estonia</option>
		<option value="Ethiopia">Ethiopia</option>
		<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
		<option value="Faroe Islands">Faroe Islands</option>
		<option value="Fiji">Fiji</option>
		<option value="Finland">Finland</option>
		<option value="France">France</option>
		<option value="French Guiana">French Guiana</option>
		<option value="French Polynesia">French Polynesia</option>
		<option value="French Southern Territories">French Southern Territories</option>
		<option value="Gabon">Gabon</option>
		<option value="Gambia">Gambia</option>
		<option value="Georgia">Georgia</option>
		<option value="Germany">Germany</option>
		<option value="Ghana">Ghana</option>
		<option value="Gibraltar">Gibraltar</option>
		<option value="Greece">Greece</option>
		<option value="Greenland">Greenland</option>
		<option value="Grenada">Grenada</option>
		<option value="Guadeloupe">Guadeloupe</option>
		<option value="Guam">Guam</option>
		<option value="Guatemala">Guatemala</option>
		<option value="Guernsey">Guernsey</option>
		<option value="Guinea">Guinea</option>
		<option value="Guinea-bissau">Guinea-bissau</option>
		<option value="Guyana">Guyana</option>
		<option value="Haiti">Haiti</option>
		<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
		<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
		<option value="Honduras">Honduras</option>
		<option value="Hungary">Hungary</option>
		<option value="Iceland">Iceland</option>
		<option value="India">India</option>
		<option value="Indonesia">Indonesia</option>
		<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
		<option value="Iraq">Iraq</option>
		<option value="Ireland">Ireland</option>
		<option value="Isle of Man">Isle of Man</option>
		<option value="Israel">Israel</option>
		<option value="Italy">Italy</option>
		<option value="Jamaica">Jamaica</option>
		<option value="Japan">Japan</option>
		<option value="Jersey">Jersey</option>
		<option value="Jordan">Jordan</option>
		<option value="Kazakhstan">Kazakhstan</option>
		<option value="Kenya">Kenya</option>
		<option value="Kiribati">Kiribati</option>
		<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
		<option value="Korea, Republic of">Korea, Republic of</option>
		<option value="Kuwait">Kuwait</option>
		<option value="Kyrgyzstan">Kyrgyzstan</option>
		<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
		<option value="Latvia">Latvia</option>
		<option value="Lebanon">Lebanon</option>
		<option value="Lesotho">Lesotho</option>
		<option value="Liberia">Liberia</option>
		<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
		<option value="Liechtenstein">Liechtenstein</option>
		<option value="Lithuania">Lithuania</option>
		<option value="Luxembourg">Luxembourg</option>
		<option value="Macao">Macao</option>
		<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
		<option value="Madagascar">Madagascar</option>
		<option value="Malawi">Malawi</option>
		<option value="Maldives">Maldives</option>
		<option value="Mali">Mali</option>
		<option value="Malta">Malta</option>
		<option value="Marshall Islands">Marshall Islands</option>
		<option value="Martinique">Martinique</option>
		<option value="Mauritania">Mauritania</option>
		<option value="Mauritius">Mauritius</option>
		<option value="Mayotte">Mayotte</option>
		<option value="Mexico">Mexico</option>
		<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
		<option value="Moldova, Republic of">Moldova, Republic of</option>
		<option value="Monaco">Monaco</option>
		<option value="Mongolia">Mongolia</option>
		<option value="Montenegro">Montenegro</option>
		<option value="Montserrat">Montserrat</option>
		<option value="Morocco">Morocco</option>
		<option value="Mozambique">Mozambique</option>
		<option value="Myanmar">Myanmar</option>
		<option value="Namibia">Namibia</option>
		<option value="Nauru">Nauru</option>
		<option value="Nepal">Nepal</option>
		<option value="Netherlands">Netherlands</option>
		<option value="Netherlands Antilles">Netherlands Antilles</option>
		<option value="New Caledonia">New Caledonia</option>
		<option value="New Zealand">New Zealand</option>
		<option value="Nicaragua">Nicaragua</option>
		<option value="Niger">Niger</option>
		<option value="Nigeria">Nigeria</option>
		<option value="Niue">Niue</option>
		<option value="Norfolk Island">Norfolk Island</option>
		<option value="Northern Mariana Islands">Northern Mariana Islands</option>
		<option value="Norway">Norway</option>
		<option value="Oman">Oman</option>
		<option value="Pakistan">Pakistan</option>
		<option value="Palau">Palau</option>
		<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
		<option value="Panama">Panama</option>
		<option value="Papua New Guinea">Papua New Guinea</option>
		<option value="Paraguay">Paraguay</option>
		<option value="Peru">Peru</option>
		<option value="Philippines">Philippines</option>
		<option value="Pitcairn">Pitcairn</option>
		<option value="Poland">Poland</option>
		<option value="Portugal">Portugal</option>
		<option value="Puerto Rico">Puerto Rico</option>
		<option value="Qatar">Qatar</option>
		<option value="Reunion">Reunion</option>
		<option value="Romania">Romania</option>
		<option value="Russian Federation">Russian Federation</option>
		<option value="Rwanda">Rwanda</option>
		<option value="Saint Helena">Saint Helena</option>
		<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
		<option value="Saint Lucia">Saint Lucia</option>
		<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
		<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
		<option value="Samoa">Samoa</option>
		<option value="San Marino">San Marino</option>
		<option value="Sao Tome and Principe">Sao Tome and Principe</option>
		<option value="Saudi Arabia">Saudi Arabia</option>
		<option value="Senegal">Senegal</option>
		<option value="Serbia">Serbia</option>
		<option value="Seychelles">Seychelles</option>
		<option value="Sierra Leone">Sierra Leone</option>
		<option value="Slovakia">Slovakia</option>
		<option value="Slovenia">Slovenia</option>
		<option value="Solomon Islands">Solomon Islands</option>
		<option value="Somalia">Somalia</option>
		<option value="South Africa">South Africa</option>
		<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
		<option value="Spain">Spain</option>
		<option value="Sri Lanka">Sri Lanka</option>
		<option value="Sudan">Sudan</option>
		<option value="Suriname">Suriname</option>
		<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
		<option value="Swaziland">Swaziland</option>
		<option value="Sweden">Sweden</option>
		<option value="Switzerland">Switzerland</option>
		<option value="Syrian Arab Republic">Syrian Arab Republic</option>
		<option value="Taiwan, Province of China">Taiwan, Province of China</option>
		<option value="Tajikistan">Tajikistan</option>
		<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
		<option value="Thailand">Thailand</option>
		<option value="Timor-leste">Timor-leste</option>
		<option value="Togo">Togo</option>
		<option value="Tokelau">Tokelau</option>
		<option value="Tonga">Tonga</option>
		<option value="Trinidad and Tobago">Trinidad and Tobago</option>
		<option value="Tunisia">Tunisia</option>
		<option value="Turkey">Turkey</option>
		<option value="Turkmenistan">Turkmenistan</option>
		<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
		<option value="Tuvalu">Tuvalu</option>
		<option value="Uganda">Uganda</option>
		<option value="Ukraine">Ukraine</option>
		<option value="United Arab Emirates">United Arab Emirates</option>
		<option value="United Kingdom">United Kingdom</option>
		<option value="United States">United States</option>
		<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
		<option value="Uruguay">Uruguay</option>
		<option value="Uzbekistan">Uzbekistan</option>
		<option value="Vanuatu">Vanuatu</option>
		<option value="Venezuela">Venezuela</option>
		<option value="Viet Nam">Viet Nam</option>
		<option value="Virgin Islands, British">Virgin Islands, British</option>
		<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
		<option value="Wallis and Futuna">Wallis and Futuna</option>
		<option value="Western Sahara">Western Sahara</option>
		<option value="Yemen">Yemen</option>
		<option value="Zambia">Zambia</option>
		<option value="Zimbabwe">Zimbabwe</option>
	</select>
	<br><label for='country' generated='true' class='error'></label>	
	<br>

	<!-- <div style='text-align:left'>
	<div style='margin-left:auto; margin-right:auto;'> -->
	<input type='checkbox' id='finished' name='finished'> <b>"I'm FINished with FINs" and I will never eat or serve
	shark fin soup again.</b>
	<br><label for='finished' generated='true' class='error'></label><br>
	<!-- </div>
	</div> -->


	<input type='checkbox' id='support' name='support'>
	<b>I support ending the shark fin trade in my country.</b><br>
	The global shark fin trade depletes our ocean of sharks, putting healthy marine ecosystems,<br>
	oceanic health and resilience of our  commercial fisheries at risk.
	<label for='support' generated='true' class='error'></label><br>
	<br>

	<span class='pledge-now' onclick='submitForm()'></span>

	{{ Form::close() }}
	
	<div style='height:50px'>&nbsp;</div>
</div>
</div> <!--end container-->


@stop