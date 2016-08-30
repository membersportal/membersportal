"use strict";

$(document).ready(function() {
	$('#business_type').click(function(event) {
		if ($('#business_type').val() === 'organization') {
			$('#size').removeAttr('disabled');
		}
	}
}