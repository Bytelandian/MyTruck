<?php
include 'config.php';
/**
Php script to handle the query request from the android mobile.
Two input initial city and final city is supplied by the android phone ,
which is taken from the user , as a key value pair.
Then connection is made with the database .
The query is performed and then the output is given back
to the androif phone in the form of a josn encoded string.
*/
$initial=$_POST['initial'];
$final=$_POST['final'];
$con=mysqli_connect($IP,$user,$pass,$db);
if (mysqli_connect_errno()) {echo "Failed to connect to MySQL: " . mysqli_connect_error();}
$result=mysqli_query($con,"select `Name` ,`Phone Number`,`Time Left in Departure` from Trucks where `Initial Place`=\"$initial\" and `Destination`=\"$final\"") or die("Error: ".mysqli_error($con));
while ($row=mysqli_fetch_assoc($result))
	$output[]=$row;
print(json_encode($output));
mysqli_close($con);
?>
