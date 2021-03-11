<?php
if(isset($_SESSION['username'])) {
	if($command_array[1] == '/S' && ($command_array[2] == 'ACTIVE' || $command_array[2] == 'TERMINATED')) {
		$status = $command_array[2];
	}
	else {
		$status = 'all';
	}
	
	$operatives = $operative_handler->return_operatives($status);
	
	$data_array[] = "table_top_2";
	$data_array[] = " &#25;" . str_pad("OPERATIVE", 41, ' ') . "&#25;" . str_pad("STATUS", 41, ' ') . "&#25; ";
	$data_array[] = "table_mid_2";
	
	foreach($operatives as $value) {
		$data_array[] = array($value['alias'], $value['status']);
	}
	
	$data_array[] = "table_bot";
}
else {
	$data_array[] = "ERROR: NOT LOGGED IN";
}
?>