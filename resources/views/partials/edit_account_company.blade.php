<div class="form-group">
	<label for="name">Company Name</label>
	<input type="text" class="form-control" name="name" value="{{ $company->name }}" maxlength="120" required>
		@if ($errors->has('name'))
			{!! $errors->first('name', '<span class="help-block alert alert-warning">:message</span>') !!}
		@endif
</div>
<p class="dropdown_label">Industry</p>
	<select class="form-control" name="industry" required>
		<option value="1">Accommodations</option>
		<option value="2">Accounting</option>
		<option value="3">Advertising</option>
		<option value="4">Aerospace</option>
		<option value="5">Agriculture &amp; Agribusiness</option>
		<option value="6">Air Transportation</option>
		<option value="7">Apparel &amp; Accessories</option>
		<option value="8">Auto</option>
		<option value="9">Architecture</option>
		<option value="10">Banking</option>
		<option value="12">Beauty &amp; Cosmetics</option>
		<option value="13">Biotechnology</option>
		<option value="14">Chemical</option>
		<option value="15">Communications</option>
		<option value="16">Computer</option>
		<option value="17">Construction</option>
		<option value="18">Consulting</option>
		<option value="19">Consumer Products</option>
		<option value="20">Education</option>
		<option value="21">Electronics</option>
		<option value="22">Employment</option>
		<option value="23">Energy</option>
		<option value="24">Entertainment &amp; Recreation</option>
		<option value="25">Fashion</option>
		<option value="26">Financial Services</option>
		<option value="27">Fine Arts</option>
		<option value="28">Food &amp; Beverage</option>
		<option value="29">Health</option>
		<option value="30">Information</option>
		<option value="31">Information Technology</option>
		<option value="32">Insurance</option>
		<option value="33">Journalism &amp; News</option>
		<option value="34">Legal Services</option>
		<option value="35">Manufacturing</option>
		<option value="36">Media &amp; Broadcasting</option>
		<option value="37">Medical Devices &amp; Supplies</option>
		<option value="38">Motion Pictures &amp; Video</option>
		<option value="39">Music</option>
		<option value="40">Pharmaceutical</option>
		<option value="41">Public Administration</option>
		<option value="42">Public Relations</option>
		<option value="43">Publishing</option>
		<option value="44">Real Estate</option>
		<option value="45">Retail</option>
		<option value="46">Service</option>
		<option value="47">Sports</option>
		<option value="48">Technology</option>
		<option value="49">Telecommunications</option>
		<option value="50">Tourism</option>
		<option value="51">Transportation</option>
		<option value="52">Travel</option>
		<option value="53">Utilities</option>
		<option value="54">Video Game</option>
		<option value="55">Web Services</option>
	</select>
<div class="form-group">
	<label for="desc">About</label>
	<textarea name="desc" maxlength="2000" rows="12">{{ $company->desc }}</textarea>
</div>
<div class="checkbox">
	<label for="female_owned">
		<input type="checkbox" name="female_owned" value="female_owned"> Woman-Owned
	</label>
</div>
<p class="dropdown_label">Business Type</p>
	<select class="form-control" id="business_type" name="business_type">
		<option value="freelance">Freelance</option>
		<option value="organization">Organization</option>
	</select>
<p class="dropdown_label">Number of Employees</p>
	<select class="form-control" id="size" name="size" disabled>
		<option value="fewer_than_10">Fewer Than 10</option>
		<option value="11-25">11-25</option>
		<option value="26-50">26-50</option>
		<option value="51-250">51-250</option>
		<option value="251-500">251-500</option>
		<option value="more_than_500">More Than 500</option>
	</select>
<p class="form_label">Date Established</p>
	<input type="date" class="form-control"

