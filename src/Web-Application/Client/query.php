<?php

$count=0;
$counter=0;

$p=$_POST['initial'];
$r=$_POST['destination'];
include("siteconfig.php");

$con=mysql_connect($ip,$username,$pass) or die("error".mysql_error);

mysql_select_db("Transportation",$con);

if ($p&&$r)
	$sel=mysql_query("select count(*) AS c from `Trucks` WHERE `Initial Place`='".$p."' AND `Destination`='".$r."'");
else if ($p)
	$sel=mysql_query("select count(*) AS c from `Trucks` WHERE `Initial Place`='".$p."' ");
else if ($r)
	$sel=mysql_query("select count(*) AS c from `Trucks` WHERE `Destination`='".$r."'");
else
	$sel=mysql_query("select count(*) AS c from `Trucks`");

$sel=mysql_fetch_assoc($sel);

$count=$sel['c'];

if ($p&&$r)
	$sell=mysql_query("select * from `Trucks` WHERE `Initial Place`='".$p."' AND `Destination`='".$r."'");
else if ($p)
	$sell=mysql_query("select * from `Trucks` WHERE `Initial Place`='".$p."' ");
else if ($r)
	$sell=mysql_query("select * from `Trucks` WHERE `Destination`='".$r."'");
else
	$sell=mysql_query("select * from `Trucks`");

$arr = array();
for ($x=0; $x<$count; $x++)
  {
		$arr[$x] = array();
  } 
$qq=0;
//$sell=mysql_fetch_assoc($sell);
while($log=mysql_fetch_array($sell))
{
	
	$arr[$counter][0]=$log['Name'];$arr[$counter][1]=$log['Phone number'];$arr[$counter][2]=$log['Initial Place'];$arr[$counter][3]=$log['Destination'];$arr[$counter][4]=$log['Time Left in Departure'];;
	$counter+=1;
}

?>
