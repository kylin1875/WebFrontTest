<!DOCTYPE html>
<html>
	<head>
		<title>Distance Matrix service</title>
		<style>#right-panel {
			font-family: 'Roboto','sans-serif';
			line-height: 30px;
			padding-left: 10px;
		}
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
		#map {
			height: 100%;
			width: 50%;
		}
		#output {
			font-size: 20px;
		}</style>
	</head>
	<body>
		<label for="user_original">Address 1：</label>  
		<input type="text" id="user_original" name="user_original" class="text"  required/>  
		<br/>  
		<label for="user_destination">Address 2：</label>  
		<input type="text" id="user_destination" name="user_destination" required/>
		<br/>  
		<label for="user_destination"></label> 
		<br/>
		<input type="button" onclick="calculate()" value="Calculate Distance"/>  

		<div id="output">Result:</div>
		<div id="map">Map</div>
		<script  src="http://maps.google.com/maps/api/js?&key=AIzaSyDocb9jPsUc5C8l1KC4SdXOzR_XJ7cFe80 "></script>
		<script type="text/javascript">
		var origin;
		var destination;
		var service;
			function calculate() {
				var bounds = new google.maps.LatLngBounds;
				var markersArray = [];
				origin=document.getElementById("user_original").value; 
				destination=document.getElementById("user_destination").value;
				service = new google.maps.DistanceMatrixService;
				
				service.getDistanceMatrix({
					origins: [origin],
					destinations: [destination],
					travelMode: google.maps.TravelMode.DRIVING,
					unitSystem: google.maps.UnitSystem.METRIC,
					avoidHighways: false,
					avoidTolls: false
				}, function (response, status) {
					if (status !== google.maps.DistanceMatrixStatus.OK) {
						alert('Error was: ' + status);
					} else {
						var originList = response.originAddresses;
						var destinationList = response.destinationAddresses;
						deleteMarkers(markersArray);
						}
						var destinationIcon = 'https://chart.googleapis.com/chart?' +
								'chst=d_map_pin_letter&chld=D|FF0000|000000';
						var originIcon = 'https://chart.googleapis.com/chart?' +
								'chst=d_map_pin_letter&chld=O|FFFF00|000000';
						var map = new google.maps.Map(document.getElementById('map'), {
							center: {lat: 55.53, lng: 9.4},
							zoom: 10
						});
						var geocoder = new google.maps.Geocoder;


						var showGeocodedAddressOnMap = function(asDestination) {
							var icon = asDestination ? destinationIcon : originIcon;
							return function(results, status) {
								if (status === google.maps.GeocoderStatus.OK) {
									map.fitBounds(bounds.extend(results[0].geometry.location));
									markersArray.push(new google.maps.Marker({
										map: map,
										position: results[0].geometry.location,
										icon: icon
									}));
								} else {
									alert('Geocode was not successful due to: ' + status);
								}
							};
						};

						for (var i = 0; i < originList.length; i++) {
							var results = response.rows[i].elements;
							geocoder.geocode({'address': originList[i]},showGeocodedAddressOnMap(false));
							for (var j = 0; j < results.length; j++) {
								geocoder.geocode({'address': destinationList[j]},showGeocodedAddressOnMap(true));
								document.getElementById('output').innerHTML += originList[i] + ' to ' + destinationList[j] +
										': ' + results[j].distance.text + ' in ' +
										results[j].duration.text + '<br>';
							}
						}
					});
				}
				
				function deleteMarkers(markersArray) {
					for (var i = 0; i < markersArray.length; i++) {
						markersArray[i].setMap(null);
					}
					markersArray = [];
				}
		
     </script>
	</body>
</html>