<?php
include 'config.php';
/**
Php script to add the truck in the database .
The truck driver using android app , submit the required details ,
and then the app connects to the server and sends the request.
*/
$name=$_POST["name"];
$phone=$_POST["phone"];
$initial=$_POST["initial"];
$final=$_POST["final"];
if (strpos($initial,",")!="")
$initial=substr($initial,0,strpos($initial,",")); 
$time=$_POST["time"];
$times=$time; //Variable used in mail
$time=$time*60;//Variable that corresponds to the time (in minutes) for which the driver can wait which is being subtracted by the crontab.
$con=mysqli_connect($IP,$user,$pass,$db);
if (mysqli_connect_errno()) {echo "Failed to connect to MySQL: " . mysqli_connect_error();}

$result=mysqli_query($con,"select count(*) as Time from Trucks where `Phone number`=$phone") or die("Error: ".mysqli_error($con));
$row = mysqli_fetch_array($result)  or die('Error, query failed');
if ($row['Time']==1)				//If there is already a entry of that phone number
{
	mysqli_query($con,"UPDATE Trucks SET `Name`=\"$name\",`Initial Place`=\"$initial\",`Destination`=\"$final\",`Time Left in Departure`=$time WHERE `Phone number`=$phone");
}
else
{
	mysqli_query($con,"INSERT INTO Trucks (`Name`,`Phone number`,`Initial Place`,`Destination`,`Time Left in Departure`) VALUES (\"$name\",$phone,\"$initial\",\"$final\",$time)")  or die(mysqli_error($con));
}
/**
Php script to send the mail to the clients who have 
registered for the service for the drivers going form initial to final.
Since this driver is going by that route , so a mail will be send
to every client who have registered for the service . Also a link
to unsubscibe from further mail is also send , such that 
the client who confirms with this driver can remove himself 
from the database to avoid further mails.
*/
require_once "Mail.php";
$con=mysqli_connect($IP,$user,$pass,$db);
if (mysqli_connect_errno()) {echo "Failed to connect to MySQL: " . mysqli_connect_error();}
$result=mysqli_query($con,"select * from Clients where `Initial Place`=\"$initial\" and `Destination`=\"$final\" " ) or die("Error: ".mysqli_error($con));
while ($row=mysqli_fetch_assoc($result))
{
	$from = 'MyrouteMyTruck@gmail.com';
	$to = $row['EmailId'];
	$subject = 'New Driver for your route';
	$body = "Hi,\nThere is a new driver going from the same route as your route.\n\nName : $name .\nPhone Number : $phone.\nInitial Place : $initial .\nDestination : $final\nTime Left in Departure : $times hrs.\n\nYou can contact him to go from $initial to $final.\n\nIf you are confirmed with the driver .Please Click on the link given below to unsubscribe to avoid further mails.\nLink to Unsubscribe : http://10.1.9.117/CSL458/deleteclient.php?email=$to\n\nYou can register again if you want to use our service again.";
	$headers = array('From' => $from,'To' => $to,'Subject' => $subject);
	$smtp = Mail::factory('smtp', array('host' => 'ssl://smtp.gmail.com','port' => '465','auth' => true,
	'username' => 'MyRouteMyTruck@gmail.com','password' => 'projectforcourse'));
	$mail = $smtp->send($to, $headers, $body);
}
?>
