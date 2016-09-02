<div>
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
			var geocoder = new google.maps.Geocoder();
			var businesses = {{ $locations->toJson() }}
			

			businesses.forEach(function (element) {

				geocoder.geocode({ "address": element.address }, function (results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						var marker = new google.maps.Marker({
							position: results[0].geometry.location, 
							map: map, 
							animation: google.maps.Animation.DROP
						});
						var infoWindow = new google.maps.InfoWindow({
							content: "<p>" + element.company_id + "</p>" + "<p>" + element.user_id + "</p>"
						});
						marker.addListener('click', function() {
							map.setCenter(results[0].geometry.location);
							infoWindow.open(map, marker);
    					});
					} else {
						alert("Geocoding was not successful - STATUS: " + status);
					} 
					
					// var marker = new google.maps.Marker({
					// 	position: location,
					// 	map: map,
					// 	animation: google.maps.Animation.DROP
					// })
					// var infowindow = new google.maps.InfoWindow({
					// 	content: address.content
					// })

					// marker.addListener('click', function() {
					// map.setZoom(13);
					// map.setCenter(location);
					// infowindow.open(map, marker);
					// })	
				})
			})
		})();
	</script>
</div>