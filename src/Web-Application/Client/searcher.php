<html>
	<script type="text/javascript" src="js/jquery-latest.js"></script> 
	<link rel="stylesheet" href="css/styler.css" type="text/css" id="" media="print, projection, screen" />
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="js/popupplugin.js"></script>
	<head>
	<p style="font-size:40px;font-weight:bold;color:#ffffff;">Search Results : </p><br>
	</head>
	<body class="bdy">
	<table id="myTable" class="tablesorter"> 
	<thead> 
	<tr> 
    <th>Name</th> 
    <th>Contact</th> 
    <th>Pick Up City</th> 
    <th>Deliver City</th> 
    <th>Time Left in Departure</th> 
    <th>Search</th>
	</tr> 
	</thead> 
	<tbody> 
	<?php 
	$cnt=0;
	$qr=$_POST['query'];	
	//$ar=$_GET['result'];	
	$count=$_POST['co'];
	$ar = array();
	for ($x=0; $x<$count; $x++)
	{
		$ar[$x] = array();
	} 	
	$ar=$_POST['result'];

	while ($cnt<$count)
	{
			if (strtoupper($qr)==strtoupper($ar[$cnt][0]) or strtoupper($qr)==strtoupper($ar[$cnt][1]) or strtoupper($qr)==strtoupper($ar[$cnt][2]) or strtoupper($qr)==strtoupper($ar[$cnt][3]) or strtoupper($qr)==strtoupper($ar[$cnt][4]))
			{echo('<tr>'); 
			echo('<td>'.$ar[$cnt][0].'</td>'); 
			echo('<td>'.$ar[$cnt][1].'</td>'); 
			echo('<td id="ac'.$cnt.'">'.$ar[$cnt][2].'</td>'); 
			echo('<td id="dc'.$cnt.'">'.$ar[$cnt][3].'</td>'); 
			
			$qq=$ar[$cnt][4];
			$aa=$qq%60;
			
			
				$qq=floor($qq/60);
				$types=$qq." hours ".$aa." minutes";
			echo('<td>'.$types.'</td>'); 
			echo('<td><button type="button" id="'.$cnt.'" class="button" onClick="checkRoute(this.id)" style="height:27px;width:69px;background: url(images/mapview.jpg);"></button></td>');
			echo('</tr>');} 
			$cnt+=1;
	}
	?>

	</tbody> 
	</table> 
	
	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
	<div id="popup" >
		<a class="b-close">X<a/>
		<h4 style="color:#33CCFF">Check Whether Your City Lies On The Route Or Not </h4>
		<input type="text" id="i" style="height:28px;width:250px"><br><br>
		<button type="button" onclick="onQuery()" style="height:28px;width:74px;background: url('images/search.gif');"></button><br><br>
		<div id="googleMap" style="width:500px;height:380px;paddingtop:10px;"></div>
		<p id="p1"></p>
	</div> 	
	</body>
	<script>
	var map;
	var startCity;
	var endCity;
	function onQuery(){
		var marker;
		var queryCity=document.getElementById("i").value;
		var geocoder =  new google.maps.Geocoder();
		geocoder.geocode( { 'address': queryCity}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
			var lat,lng;
			lat=results[0].geometry.location.lat();
			lng=results[0].geometry.location.lng();
			createMarker(lat,lng);
			}
			});
			
			function createMarker( lat, lng){
				var query=new google.maps.LatLng(lat,lng);
				if(!marker) marker=new google.maps.Marker({map:map,position:query});
				else marker.setPosition(query);
			}

	}
	function drawMap(lat1,lng1,lat2,lng2){	
		var start =new google.maps.LatLng(lat1,lng1);
		var end =new google.maps.LatLng(lat2,lng2);
		var directionDisplay;
		var directionsService = new google.maps.DirectionsService();
		directionsDisplay = new google.maps.DirectionsRenderer();
		var mapOptions = {
			zoom:13,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			center:start
		}
		map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
		directionsDisplay.setMap(map);
		var request = {
			origin:start,
			destination:end,
			travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			}
		});
	
	}
	

	$(document).ready(function(){
		$("#myTable").tablesorter(); 
		$("#popup").hide();
	});
	function checkRoute(id){
		startCity=document.getElementById("ac"+id).innerHTML;
		endCity=document.getElementById("dc"+id).innerHTML;
		var lat1,lng1,lat2,lng2;
		var geocoder =  new google.maps.Geocoder();
		geocoder.geocode( { 'address': startCity}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
			lat1=results[0].geometry.location.lat();
			lng1=results[0].geometry.location.lng();
			}
		});
		var geocoder2 =  new google.maps.Geocoder();
		geocoder2.geocode( { 'address': endCity}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
			lat2=results[0].geometry.location.lat();
			lng2=results[0].geometry.location.lng();
			}
		});

		setTimeout(function(){
			$("#popup").bPopup();
			drawMap(lat1,lng1,lat2,lng2);
			}, 1000);
		}

</script>

</html>
