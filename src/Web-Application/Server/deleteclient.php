<html>
<head>
<title>
My Route , MY Truck
</title>
</head>
<body style="background-color:#94FFFF">
<p style="color:sienna;margin-left:50px;font-size:150%;">
<br><br><br>
<?php
include 'config.php';
/**
Php script to delete the client from the database , who have found the 
truck for their route.A link containg the EmailId in the link as the Get method , 
is send alongwith the mail , to the client . If the client is able to contact the 
driver and confirmed , then the client unsubscribs with the service , by clicking the link 
and this script deletes him from the database.
*/
$email=$_GET["email"];
$con=mysqli_connect($IP,$user,$pass,$db);
if (mysqli_connect_errno()) {echo "Failed to connect to MySQL: " . mysqli_connect_error();}

$result=mysqli_query($con,"select count(*) as Time from Clients where `EmailId`=\"$email\"") or die("Error: ".mysqli_error($con));
$row = mysqli_fetch_array($result)  or die('Error, query failed');
if ($row['Time']==1)
{
	mysqli_query($con,"DELETE FROM Clients WHERE `EmailId`=\"$email\"");
	echo "You have successfully unsubscribed from My Route , My Truck service for now.<br>You can register if you want My route , My Truck service in future.";
}
else
{
	echo "No entry to delete";
}
echo "<br>";
?>
</p>
</body>
</html>
