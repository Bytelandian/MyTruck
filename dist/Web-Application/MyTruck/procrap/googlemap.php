<!DOCTYPE html>
<html>
<?php
$starts="kurukshetra";
$ends="ropar";
$querys="kharar";
?>
<head>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=geometry&sensor=false"></script>
<script>
	var query;// = new google.maps.LatLng(41.850033, -87.6500523);
        var start;// = new google.maps.LatLng(29.969512,76.878282);
        var end;// = new  google.maps.LatLng(30.965917,76.523023);
		var ans="Fuck";
	var directionDisplay;
	var directionsService = new google.maps.DirectionsService();
	var response;
	
	var geocoder =  new google.maps.Geocoder();
		geocoder.geocode( { 'address': "<?php echo $querys; ?>"}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
			var lat=results[0].geometry.location.lat();
			var lng=results[0].geometry.location.lng();
			query=new google.maps.LatLng(lat,lng);}});
	var geocodered =  new google.maps.Geocoder();
	geocodered.geocode( { 'address': "<?php echo $starts; ?>"}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
			var lat=results[0].geometry.location.lat();
			var lng=results[0].geometry.location.lng();
			start=new google.maps.LatLng(lat,lng);}});
	var geocoderef =  new google.maps.Geocoder();
	geocoderef.geocode( { 'address': "<?php echo $ends; ?>"}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
			var lat=results[0].geometry.location.lat();
			var lng=results[0].geometry.location.lng();
			end=new google.maps.LatLng(lat,lng);}});

	function checkVia(dir){
	
		if(dir)response=dir;
		if(response){
			var poly=new google.maps.Polyline({path:google.maps.geometry.encoding.decodePath(response.routes[0].overview_polyline.points)});
			ans=google.maps.geometry.poly.containsLocation(query,poly);
			document.getElementById('result').innerHTML=ans;

		}
		

		else
			ans="";
        
	}
	function initialize(){
		ans="lol";
		//start=new google.maps.LatLng(29.969512,76.878282);//new locationop("<?php echo $starts; ?>");
		//end=new  google.maps.LatLng(30.965917,76.523023);//new locationop("<?php echo $ends; ?>");
		//query=new locationop("<?php echo $querys; ?>");
		//document.getElementById('result').innerHTML="lol";
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
	function AJAXAction ()
        {
            $.ajax({
                url: 'ajaxe.php',
                data: { myPhpData: ans },
               success: function (response) {
                alert (response);
               }
            }); 
        }

	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<?php echo $ans ?>
<p id="result">Hellos</p>
</body>
</html>
