<!DOCTYPE html>
<html>
<head>
	<style>
		.Headline{
			font-family: Arial;
			font-size: 14pt;
			color: #003564;
			font-weight: bold;
			font-style: normal;
			text-decoration: none;border-bottom: 2px solid #003564; padding-bottom: 3px; margin-bottom: 12px;}
			
		h2{font-family: Arial;
			font-size: 11pt;
			color: #005724;
			font-weight: bold;
			font-style: normal;
			text-decoration: none; margin-bottom: 0;}
			
		.Section1{text-align: left; margin: 10px 0px; padding:0px 7px 0px 0px;}
		.textLayoutStylesOne{line-height: 20px; border-bottom: 1px solid #005724;}
		textFirstFloat{float: left; width: 100%; height: auto;}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="scripts/ajax-scripts.js"></script>
</head>
<body>
	<div id="Section1">
		<h1 class="Headline">Board Meeting Minutes</h1>
		
		
		
		<div class="textLayoutStylesOne">
			<h2>Search Meeting Minutes</h2>
			
			<div class="search-box">
				<form  id="search-box-form" action="">
					<label for="search_terms">Search: </label>
					<input type="text" name="search_terms">
				</form>
			</div>
		</div>
		
		<?php require_once(/DB/PHP/JSON_mmCreatos.php); ?>
		
		<div class="textLayoutStylesOne">
			<h2>County Board Meeting Minutes</h2>
			<div class="textFirstFloat">first</div>
		</div>
		
		
		
		<div class="textLayoutStylesOne">
			<h2>Circuit Court Board Meeting Minutes</h2>
			<div class="textFirstFloat"></div>
		</div>

	</div>
</body>
</html>