
<!DOCTYPE html>
<html lang="en" >
<head> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery-latest.js"></script> 
<script type="text/javascript" src="jquery.tablesorter.js"></script> 

	<style type="text/css" media="screen">
		@import url(http://fonts.googleapis.com/css?family=Ubuntu);
		
		* {margin: 0; padding: 0; }
		
		body {
			font-family: Ubuntu, arial, verdana;
			background: #0586AD;
			overflow-x: scroll;
		}
		
		/*----------
		Blocks
		----------*/
		/*Pricing table and price blocks*/
		.pricing_table {
			line-height: 150%;
		 
			font-size: 12px; 
			margin: 0 auto; 
			width: 75%; 
			max-width: 800px; 
			padding-top: 10px;
			margin-top: 100px;
		}
		
		.price_block {
			text-align: center; 
			width: 100%; 
			color: #fff; 
			float: left; 
			list-style-type: none; 
			transition: all 0.25s; 
			position: relative; 
			box-sizing: border-box;
			
			margin-bottom: 10px; 
			border-bottom: 1px solid transparent; 
		}
		
		/*Price heads*/
		.pricing_table h3 {
			text-transform: uppercase; 
			padding: 5px 0; 
			background: #333; 
			margin: -10px 0 1px 0;
		}
		
		/*Price tags*/
		.price {
			display: table; 
			background: #444; 
			width: 100%; 
			height: 70px; 
		}
		.price_figure {
			font-size: 24px; 
			text-transform: uppercase; 
			vertical-align: middle; 
			display: table-cell;
		}
		.price_number {
			font-weight: bold; 
			display: block;
		}
		.price_tenure {
			font-size: 11px; 
		}
		
		/*Features*/
		.features {
			background: #DEF0F4; 
			color: #000;
		}
		.features li {
			padding: 8px 15px;
			border-bottom: 1px solid #ccc; 
			font-size: 11px; 
			list-style-type: none;
		}
		
		.footer {
			padding: 15px; 
			background: #DEF0F4;
		}
		.action_button {
			text-decoration: none; 
			color: #fff; 
			font-weight: bold; 
			border-radius: 5px; 
			background: linear-gradient(#666, #333); 
			padding: 5px 20px; 
			font-size: 11px; 
			text-transform: uppercase;
		}
		
		.price_block:hover {
			box-shadow: 0 0 0px 5px rgba(0, 0, 0, 0.5); 
			transform: scale(1.04) translateY(-5px); 
			z-index: 1; 
			border-bottom: 0 none;
		}
		.price_block:hover .price {
			background:linear-gradient(#DB7224, #F9B84A); 
			box-shadow: inset 0 0 45px 1px #DB7224;
		}
		.price_block:hover h3 {
			background: #222;
		}
		.price_block:hover .action_button {
			background: linear-gradient(#F9B84A, #DB7224); 
		}
		
		
		@media only screen and (min-width : 480px) and (max-width : 768px) {
			.price_block {width: 50%;}
			.price_block:nth-child(odd) {border-right: 1px solid transparent;}
			.price_block:nth-child(3) {clear: both;}
			
			.price_block:nth-child(odd):hover {border: 0 none;}
		}
		@media only screen and (min-width : 768px){
			.price_block {width: 25%;}
			.price_block {border-right: 1px solid transparent; border-bottom: 0 none;}
			.price_block:last-child {border-right: 0 none;}
			
			.price_block:hover {border: 0 none;}
		}
		.skeleton, .skeleton ul, .skeleton li, .skeleton div, .skeleton h3, .skeleton span, .skeleton p {
			border: 5px solid rgba(255, 255, 255, 0.9);
			border-radius: 5px;
			margin: 7px !important;
			background: rgba(0, 0, 0, 0.05) !important;
			padding: 0 !important;
			text-align: left !important;
			display: block !important;
			
			width: auto !important;
			height: auto !important;
			
			font-size: 10px !important;
			font-style: italic !important;
			text-transform: none !important;
			font-weight: normal !important;
			color: black !important;
		}
		.skeleton .label {
			font-size: 11px !important;
			font-style: italic !important;
			text-transform: none !important;
			font-weight: normal !important;
			color: white !important;
			border: 0 none !important;
			padding: 5px !important; 
			margin: 0 !important;
			float: none !important;
			text-align: left !important;
			text-shadow: 0 0 1px white;
			background: none !important;
		}
		.skeleton {
			display: none !important;
			margin: 100px !important;
			clear: both;
		}
	</style>
</head>

<body>
	<ul id="myTable" class="pricing_table">
			<li class="price_block">
<h3>Service</h3>
<div class="price">
<div class="price_figure">
<span class="price_number"></span>
</div>
</div>
<ul class="features">
<li>Name</li>
<li>Contact</li>
<li>Pick Up City</li>
<li>Delivery City</li>
<li>Date</li>
<li>Time</li>
</ul>
<div class="footer">
</div>
</li>
			<?php include("query.php"); 



			
			$cnt=0;
			
		while ($cnt<$count)
		{
			
			//echo(answer[cnt]);	
		echo('<li class="price_block">');
			echo('<h3>Service</h3>');
			echo('<div class="price">');
				echo('<div class="price_figure">');
					echo('<span class="price_number">Contact'.($cnt+1).'</span>');
				echo('</div>');
			echo('</div>');
				echo('<ul class="features">');
				echo('<li>'.$arr[$cnt][0].'</li>');
				echo('<li>'.$arr[$cnt][1].'</li>');
				echo('<li>'.$arr[$cnt][2].'</li>');
				echo('<li>'.$arr[$cnt][3].'</li>');
				echo('<li>'.$arr[$cnt][4].'</li>');
				echo('<li>'.$arr[$cnt][5].'</li>');
				//echo('<li>'.$arr[$cnt][5].'</li>');
				//echo('<li>'.$arr[$cnt][6].'</li>');
				//echo('<li>'.$arr[$cnt][7].'</li>');
			echo('</ul>');
			$cnt+=1;

			
			
			echo('<div class="footer">');
				echo('</div>');
		echo('</li>');
		
	
	echo('<ul class="skeleton pricing_table" style="margin-top: 100px;">');
		echo('<li class="label" style="margin: 0 none;">ul.pricing_table</li>');
		echo('<li class="price_block">');
			echo('<span class="label">li.price_block</span>');
			echo('<h3><span class="label">h3</span></h3>');
			echo('<div class="price">');
				echo('<span class="label">div.price</span>');
				echo('<div class="price_figure">');
					echo('<span class="label">div.price_figure</span>');
					echo('<span class="price_number">');
						echo('<span class="label">span.price_number</span>');
					echo('</span>');
					echo('<span class="price_tenure">');
						echo('<span class="label">span.price_tenure</span>');
					echo('</span>');
				echo('</div>');
			echo('</div>');
			echo('<ul class="features">');
				echo('<li class="label">ul.features</li>');
				
			echo('</ul>');
			echo('<div class="footer">');
				echo('<span class="label">div.footer</span>');
			echo('</div>');
		echo('</li>');
		
		
		
	echo('</ul>');
}
	?>
	<script>
	$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 
</script>
	<script src="prefixfree.min.js" type="text/javascript"></script>
	
	
</body>
</html>
