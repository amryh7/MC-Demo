<?php

	require_once(user_connect.php);

	$query_statement = "SELECT * FROM meeting";

	$link = $connect;
	
	if(!$connect){echo 'linked';} else {echo 'no link';};
	if(!$link){echo 'linked';} else {echo 'no link';};
	
	$result = mysqli_query($link, $query_statement);

	while ($row = mysqli_fetch_row($result)) {
		$meet_board = ucwords($row[3]);
		echo '<div class="textLayoutStylesOne">'
				'<h2>' $meet_board '</h2>'
				'<div class="textFirstFloat">';
				
			if($row[2] == "THE BOARD OF COUNTY COMMISSIONERS"){
				echo '<a title="County Board Meeting Minutes -- '.$row[1].'" class="Hyperlink" href="'.$row[7].'" target="_blank"><br>'
						'County Board Meeting Minutes -- '.$row[1].'</a><br>';
			} else if $row[2] == "THE BOARD OF CIRCUIT COURT"){
				echo '<a title="Circuit Court Meeting Minutes -- '.$row[1].'" class="Hyperlink" href="'.$row[7].'" target="_blank"><br>'
						'Circuit Court Meeting Minutes -- '.$row[1].'</a><br>';
				
			};
			
		echo '</div></div>';
		
	};

?>