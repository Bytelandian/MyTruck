<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Visit www.psdgraphics.com for more stuff</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="psdgraphics-com-table">



<div id="psdg-header">
<span class="psdg-bold">Table of Available Contacts</span><br />
Done for project:CSL458
</div>

<div id="psdg-top">
<div class="psdg-top-cell" style="text-align:left; padding-left: 24px;"></div>
<div class="psdg-top-cell">Name</div>
<div class="psdg-top-cell">Phone</div>
<div class="psdg-top-cell">Pick Up City</div>
<div class="psdg-top-cell" style="border:none;">Delivery City</div>
<div class="psdg-top-cell">Date</div>
</div>


<div id="psdg-middle">

<?php include("query.php"); 
$cnt=0;
			
		while ($cnt<$count)
		{
echo('<div class="psdg-left">Contact'.($cnt+1).'</div>');
echo('<div class="psdg-right">'.$arr[$cnt][0].'</div>');
echo('<div class="psdg-right">'.$arr[$cnt][1].'</div>');
echo('<div class="psdg-right">'.$arr[$cnt][2].'</div>');
echo('<div class="psdg-right">'.$arr[$cnt][3].'</div>');
echo('<div class="psdg-right">'.$arr[$cnt][4].'</div>');
$cnt+=1;}
?>




</div>


<div id="psdg-footer">
* Lorem Ipsum is simply dummy text of the printing and typesetting industry.
</div>




</div>







</body>
</html>
