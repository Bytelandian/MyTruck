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
Php script to add the client in the database who register for the mail 
to notify them whenever a new driver is going from the same route as
he wants . The user fill the details and then this script is called with 
all the data in the form pf post data.Then if no such user is there based on
the email Id (primary key) the entry is added otherwise the entry is updated.
A mail is send to the client for registering.
*/
require_once "Mail.php";
$name=$_POST["name"];
$email=$_POST["email"];
$initial=$_POST["initial"];
$final=$_POST["final"];
$time=$_POST["time"];
$times=$time; //variable used in mail
$time=$time*60;

if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
	$con=mysqli_connect($IP,$user,$pass,$db);
	if (mysqli_connect_errno()) {echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	$result=mysqli_query($con,"select count(*) as Time from Clients where `EmailId`=\"$email\"") or die("Error: ".mysqli_error($con));
	$row = mysqli_fetch_array($result)  or die('Error, query failed');
	if ($row['Time']==1)
	{
		mysqli_query($con,"UPDATE Clients SET `Name`=\"$name\",`Initial Place`=\"$initial\",`Destination`=\"$final\",`Time Left in Departure`=$time WHERE `EmailId`=\"$email\"");
		echo "Your entry is successfully updated.<br>You will be notified by email when a driver of path from $initial to $final contacts us before $times hours.";
	}
	else
	{
		mysqli_query($con,"INSERT INTO Clients (`Name`,`EmailId`,`Initial Place`,`Destination`,`Time Left in Departure`) VALUES (\"$name\",\"$email\",\"$initial\",\"$final\",$time)")  or die(mysqli_error($con));
		echo "Your entry is successfully added.<br>You will be notified by email when a driver of path from $initial to $final contacts us before $times hours.";
	}
	/**
	Php script to send a mail to the client for registering.
	A new gmail Id is made for sending the mail to the client.
	Gmail SMTP server is used for sending the mail.
	*/
	$from = 'MyrouteMyTruck@gmail.com';
	$to = $email;
	$subject = 'Registration for My Truck';
	$body = "Hi,\nThank you for registering for My Truck\n\n\nName : $name .\nInitial Place : $initial .\nDestination : $final\nTime Left in Departure : $times.\n\n\nYou will be informed when any truck wants a client from $initial to $final within $times hours.";
	$headers = array('From' => $from,'To' => $to,'Subject' => $subject);
	$smtp = Mail::factory('smtp', array('host' => 'ssl://smtp.gmail.com','port' => '465','auth' => true,
	'username' => 'MyRouteMyTruck@gmail.com','password' => 'projectforcourse'));
	$mail = $smtp->send($to, $headers, $body);
}
else echo "Please Enter a valid email ID";
?>
</p>
</body>
</html>
