<?php
if(isset($_SESSION['username'])) {
	$data_array[] = "ALREADY LOGGED IN AS " . $_SESSION['username'];
}
else if($operative_handler->check_credentials($command_array[1], $command_array[2])) {
	$_SESSION['username'] = $command_array[1];
	$_SESSION['user_id'] = strtoupper(substr(hash('sha256', $_SESSION['username'] . $_SERVER['REMOTE_ADDR']), 8, 16));
	
	$data_array[] = "ACCESS GRANTED FOR OPERATIVE: " . $_SESSION['username'];
}
else {
	$data_array[] = "ACCESS DENIED: INCORRECT USERNAME OR PASSWORD";
}
?>
