<?php

$db_host = "localhost";
/*  --  Godaddy uses 'localhost' because you are connecting from a script on the same system  --  */

$db_name = "mc";

$db_username = $_REQUEST['user_name'];

$db_password = $_REQUEST['user_password'];
if($db_username == "root"){$db_password = "";};

$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if(!$connect){die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());;}
			
// var data = {"Connected to MySQL at:" : $db_host, "Selected database :" : $db_name};
//echo data;
echo '{"connection":"' . $db_host . '", "database":"' . $db_name . '"}'
		
?>