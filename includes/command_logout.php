<?php
if(isset($_SESSION['username'])) {
	unset($_SESSION['username']);
	$data_array[] = "LOGGED OUT";
}
else {
	$data_array[] = "ERROR: NOT LOGGED IN";
}
?>