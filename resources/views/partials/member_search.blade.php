<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2OJukM41NiEP_KnDGkx4mQ6HSucCuhwI"></script>
<script>
	(function() {
		"use strict";

		var mapOptions = {
			zoom: 10,
			center: {
				lat:  29.426791,
				lng: -98.489602
			},
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(document.getElementById("map"), mapOptions);
		var markers = [];
		var geocoder = new google.maps.Geocoder();
		var address = "{{ $current_user_address }}";

		geocoder.geocode( {'address': address}, function(results, status) {
			if(status == google.maps.GeocoderStatus.OK) {
				new google.maps.Marker({
					position: results[0].geometry.location,
					map: map
				});
				map.setCenter(results[0].geometry.location);
			}
		});

		function clearMarkers(){
			markers.forEach(function(marker){
				marker.setMap(null);
			});
		}

		function getSearchResults(){
			$.ajax("{{ action('CompaniesController@getSearchedCompanies') }}", {
				type: "GET",
				data: {
					'searchField': $('#searchField').val(),
					'industry_id': $('#industry_id').val(),
					'organization': ($('#organization').prop('checked')) ? 1 : 0,
					'woman_owned': ($('#woman_owned').prop('checked')) ? 1 : 0,
					'family_owned': ($('#family_owned').prop('checked')) ? 1 : 0,
					'contractor':( $('#contractor').prop('checked')) ? 1 : 0,
				}
			}).done(function(data){
				var search_results = data.results;
				var businesses = data.locations;
				clearMarkers();
				markers = [];
					businesses.forEach(function(business) {
						var address = business.address_line_1 + ' ' + business.city + ' ' + business.state + ' ' + business.zip;
						geocoder.geocode({ "address": address }, function (results, status) {
							if (status == google.maps.GeocoderStatus.OK) {
								var marker = new google.maps.Marker({
									position: results[0].geometry.location,
									map: map,
									animation: google.maps.Animation.DROP,
									draggable: false
								});
								var infoWindow = new google.maps.InfoWindow({
									content: "<p>" + business.company_id + "</p>" + "<p>" + business.user_id + "</p>"
								});
								marker.addListener('click', function() {
									map.setCenter(results[0].geometry.location);
									infoWindow.open(map, marker);
								});
								markers.push(marker);
							}
						});
					});
					
					$('#results').html("");
					$('#nav_tabs').html("");
					$('#tab_content').html("");

					search_results.forEach(function(result) {
						$('#results').append("<div class=\"col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6\"><div class=\"row user_grid\"><div class=\"col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 user_avatar_div\"><a href=\"" + result.url + "\"><img class=\"img-circle center-block img-responsive user_avatar_grid\" src=\"/img/uploads/avatars/" + result.profile_img + "\"></a></div><div class=\"col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 user_text_grid\"><p class=\"company_name\">" + result.name + "</p><p class=\"industry_name\">" + result.industry.industry + "</p><p class=\"company_desc\">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p></div></div></div>") + $("#results");
					});

					var paginate = Math.ceil(search_results.length/10);
					
					for (var i = 0; i < paginate; i++) {
						$('#nav_tabs').append("<li role=\"presentation\" class=\"active\"><a href=\"#{i}\" aria-controls=\"{i}\" role=\"tab\" data-toggle=\"tab\">" + (i+1) + "</a></li>");
						$('#tab_content').append("<div class=\"tab-content\"><div role=\"tabpanel\" class=\"tab-pane active\" id=\"{i}\"></div></div>");
					}								  
				});
		}

		getSearchResults();

		$('#search_form').submit(function(e){
			e.preventDefault();
			getSearchResults();
		})

	})();
</script>