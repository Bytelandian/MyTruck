<?php
include 'config.php';
/**
Php script to delete the truck from the database , when he has got a customer.
When the truck driver has got the client , he will send the request using android app to the 
server to remove the details of the truck from the database .
After the script is called , the connection is made with the database.
Then if the entry is present it is deleted , or if it is already deleted ,
due to departure time , the database is kept same.
*/
$phone=$_POST["phone"];
$con=mysqli_connect($IP,$user,$pass,$db);
if (mysqli_connect_errno()) {echo "Failed to connect to MySQL: " . mysqli_connect_error();}
$result=mysqli_query($con,"select count(*) as Time from Trucks where `Phone number`=$phone") or die("Error: ".mysqli_error($con));
$row = mysqli_fetch_array($result)  or die('Error, query failed');
if ($row['Time']==1)
{
	mysqli_query($con,"DELETE FROM Trucks WHERE `Phone number`=$phone");
	echo "DELETED";
}
else
{
	echo "No entry to delete";
}
echo "<br>";
?>
