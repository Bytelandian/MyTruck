
<!DOCTYPE html>
<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=geometry&sensor=false"></script>
<script
src="http://maps.googleapis.com/maps/api/js?sensor=false">
</script>

<script>
	var query = new google.maps.LatLng(30.378179, 76.776697);
        var start = new google.maps.LatLng(29.969512,76.878282);
        var end = new  google.maps.LatLng(30.965917,76.523023);
	var directionDisplay;
	var directionsService = new google.maps.DirectionsService();
	var response;
	function checkVia(dir){
		if(dir)response=dir;
		if(response)
			document.getElementById('result').innerHTML=google.maps.geometry.poly.isLocationOnEdge(query,new google.maps.Polyline({path:google.maps.geometry.encoding.decodePath(response.routes[0].overview_polyline.points)}),00000000000001);

		else
			document.getElementById('result').innerHTML="";
        
	}
	function initialize(){
		directionsDisplay = new google.maps.DirectionsRenderer();
		calcRoute();
		checkVia();
	}

	function calcRoute() {
		checkVia();
		var request = {
			origin:start,
			destination:end,
			travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
				checkVia(response);
			}
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);

</script>
</head>

<body>
<p id="result">Hello</p>
</body>
</html>
