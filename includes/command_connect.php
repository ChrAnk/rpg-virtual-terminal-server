<?php
$data_array[] = "CONNECTION TO REMOTE SERVER ESTABLISHED";
$data_array[] = "";

if(isset($_SESSION['username'])) {
	$data_array[] = "PREVIOUS SESSION DETECTED";
	$data_array[] = "";
	$data_array[] = "LOGGED IN AS " . $_SESSION['username'];
}
else {
	$data_array[] = "LOG IN TO CONTINUE";
	$data_array[] = "";
	$data_array[] = "USE COMMAND 'HELP' FOR LIST OF COMMANDS";
}
?>