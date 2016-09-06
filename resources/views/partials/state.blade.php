<div class="form-group">
	<label for="state">State<span class="required">*</span></label>
	<select class="form-control" name="state" required>
		<option value="0">Select</option>
		<option value="AL" {{ $contact->state == "AL" ? 'selected' : '' }}>AL</option>
		<option value="AK" {{ $contact->state == "AK" ? 'selected' : '' }}>AK</option>
		<option value="AZ" {{ $contact->state == "AZ" ? 'selected' : '' }}>AZ</option>
		<option value="AR" {{ $contact->state == "AR" ? 'selected' : '' }}>AR</option>
		<option value="CA" {{ $contact->state == "CA" ? 'selected' : '' }}>CA</option>
		<option value="CO" {{ $contact->state == "CO" ? 'selected' : '' }}>CO</option>
		<option value="CT" {{ $contact->state == "CT" ? 'selected' : '' }}>CT</option>
		<option value="DE" {{ $contact->state == "DE" ? 'selected' : '' }}>DE</option>
		<option value="DC" {{ $contact->state == "DC" ? 'selected' : '' }}>DC</option>
		<option value="FL" {{ $contact->state == "FL" ? 'selected' : '' }}>FL</option>
		<option value="GA" {{ $contact->state == "GA" ? 'selected' : '' }}>GA</option>
		<option value="HI" {{ $contact->state == "HI" ? 'selected' : '' }}>HI</option>
		<option value="ID" {{ $contact->state == "ID" ? 'selected' : '' }}>ID</option>
		<option value="IL" {{ $contact->state == "IL" ? 'selected' : '' }}>IL</option>
		<option value="IN" {{ $contact->state == "IN" ? 'selected' : '' }}>IN</option>
		<option value="IA" {{ $contact->state == "IA" ? 'selected' : '' }}>IA</option>
		<option value="KS" {{ $contact->state == "KS" ? 'selected' : '' }}>KS</option>
		<option value="KY" {{ $contact->state == "KY" ? 'selected' : '' }}>KY</option>
		<option value="LA" {{ $contact->state == "LA" ? 'selected' : '' }}>LA</option>
		<option value="ME" {{ $contact->state == "ME" ? 'selected' : '' }}>ME</option>
		<option value="MD" {{ $contact->state == "MD" ? 'selected' : '' }}>MD</option>
		<option value="MA" {{ $contact->state == "MA" ? 'selected' : '' }}>MA</option>
		<option value="MI" {{ $contact->state == "MI" ? 'selected' : '' }}>MI</option>
		<option value="MN" {{ $contact->state == "MN" ? 'selected' : '' }}>MN</option>
		<option value="MS" {{ $contact->state == "MS" ? 'selected' : '' }}>MS</option>
		<option value="MO" {{ $contact->state == "MO" ? 'selected' : '' }}>MO</option>
		<option value="MT" {{ $contact->state == "MT" ? 'selected' : '' }}>MT</option>
		<option value="NE" {{ $contact->state == "NE" ? 'selected' : '' }}>NE</option>
		<option value="NV" {{ $contact->state == "NV" ? 'selected' : '' }}>NV</option>
		<option value="NH" {{ $contact->state == "NH" ? 'selected' : '' }}>NH</option>
		<option value="NJ" {{ $contact->state == "NJ" ? 'selected' : '' }}>NJ</option>
		<option value="NM" {{ $contact->state == "NM" ? 'selected' : '' }}>NM</option>
		<option value="NY" {{ $contact->state == "NY" ? 'selected' : '' }}>NY</option>
		<option value="NC" {{ $contact->state == "NC" ? 'selected' : '' }}>NC</option>
		<option value="ND" {{ $contact->state == "ND" ? 'selected' : '' }}>ND</option>
		<option value="OH" {{ $contact->state == "OH" ? 'selected' : '' }}>OH</option>
		<option value="OK" {{ $contact->state == "OK" ? 'selected' : '' }}>OK</option>
		<option value="OR" {{ $contact->state == "OR" ? 'selected' : '' }}>OR</option>
		<option value="PA" {{ $contact->state == "PA" ? 'selected' : '' }}>PA</option>
		<option value="RI" {{ $contact->state == "RI" ? 'selected' : '' }}>RI</option>
		<option value="SC" {{ $contact->state == "SC" ? 'selected' : '' }}>SC</option>
		<option value="SD" {{ $contact->state == "SD" ? 'selected' : '' }}>SD</option>
		<option value="TN" {{ $contact->state == "TN" ? 'selected' : '' }}>TN</option>
		<option value="TX" {{ $contact->state == "TX" ? 'selected' : '' }}>TX</option>
		<option value="UT" {{ $contact->state == "UT" ? 'selected' : '' }}>UT</option>
		<option value="VT" {{ $contact->state == "VT" ? 'selected' : '' }}>VT</option>
		<option value="VA" {{ $contact->state == "VA" ? 'selected' : '' }}>VA</option>
		<option value="WA" {{ $contact->state == "WA" ? 'selected' : '' }}>WA</option>
		<option value="WV" {{ $contact->state == "WV" ? 'selected' : '' }}>WV</option>
		<option value="WI" {{ $contact->state == "WI" ? 'selected' : '' }}>WI</option>
		<option value="WY" {{ $contact->state == "WY" ? 'selected' : '' }}>WY</option>
	</select>
</div>