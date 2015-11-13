<?php

$db_host = "localhost";
$db_name = "mc";
$db_username = $_REQUEST['user_name'];
$db_password = "";

$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if(!$connect){die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());;}
			
//echo data;
echo '{"connection":"' . $db_host . '", "database":"' . $db_name . '"}'
		
?>