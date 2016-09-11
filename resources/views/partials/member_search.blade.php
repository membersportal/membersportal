	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2OJukM41NiEP_KnDGkx4mQ6HSucCuhwI"></script>
<script>
	(function() {
		"use strict";

		var mapOptions = {
			zoom: 13,
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
		var currentLocation;

		geocoder.geocode( {'address': address}, function(results, status) {
			if(status == google.maps.GeocoderStatus.OK) {
				currentLocation = results[0].geometry.location;
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

		var rad = function(x) {
		  return x * Math.PI / 180;
		};

		var getDistance = function(p1, p2) {
			var R = 6378137; // Earth’s mean radius in meter
		 	var dLat = rad(p2.lat() - p1.lat());
		 	var dLong = rad(p2.lng() - p1.lng());
		  	var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
		  	Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) *
		  	Math.sin(dLong / 2) * Math.sin(dLong / 2);
		  	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
		  	var d = R * c;
		  	return d; // returns the distance in meter
		};

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
							if (results == null) return;

							var distanceInMiles = (getDistance(currentLocation, results[0].geometry.location) * 0.000621371).toFixed(2);
							if (status == google.maps.GeocoderStatus.OK) {
								
								var marker = new google.maps.Marker({
									position: results[0].geometry.location,
									map: map,
									animation: google.maps.Animation.DROP,
									draggable: false
								});
								var infoWindow = new google.maps.InfoWindow({
									content: "<p>" + business.company.name + "</p>" + "<p>" + business.industry + "</p>" + "<p>" + "Miles from you: " + distanceInMiles + "</p>"
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
						if (result.id != 1) {
							$('#results').append("<div class=\"col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6\"><div class=\"row user_grid\"><div class=\"col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4\"><a href=\"" + result.url + "\"><img class=\"img-circle center-block img-responsive user_avatar_grid\" src=\"/img/uploads/avatars/" + result.profile_img + "\"></a></div><div class=\"col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8\"><p class=\"company_name\">" + result.name + "</p><p class=\"industry_name\">" + result.industry_title + "</p><p class=\"company_desc\">" + result.desc.substring(0, 100)+ "...</p></div></div></div>") + $("#results");
						}
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