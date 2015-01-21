<?php
include 'config.php';
/**
Php script to update the time left in departure .
Crontab feature of the ubuntu is used to run the script periodically.
The php script is running every minute.
A separate varible is made in the database that stores the number of minutes ,
in the departure , every minute the variable is updated.
When its value reaches zero , its entry is deleted from the table.
*/
$con=mysqli_connect($IP,$user,$pass,$db);
if (mysqli_connect_errno()) 
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_query($con,"UPDATE `Trucks` SET `Time Left in Departure`=`Time Left in Departure`-1 WHERE 1");
mysqli_query($con,"DELETE FROM `Trucks` WHERE `Time Left in Departure`<=0");
//mysqli_query($con,"UPDATE `Trucks` set `Waiting Time`=ceil(`Times`/ 60)");
mysqli_query($con,"UPDATE `Clients` SET `Time Left in Departure`=`Time Left in Departure`-1 WHERE 1");
mysqli_query($con,"DELETE FROM `Clients` WHERE `Time Left in Departure`<=0");
//mysqli_query($con,"UPDATE `Clients` set `Waiting Time`=ceil(`Times`/ 60)");
?>
