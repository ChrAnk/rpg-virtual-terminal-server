<?php
if(isset($_SESSION['username'])) {
	$dossier = $operative_handler->return_dossier($command_array[1]);
	
	if($dossier) {
		$data_array[] = "table_top_1";
		$data_array[] = " &#25;" . str_pad("DOSSIER FOR: " . $dossier['alias'], 83, " ") . "&#25; ";
		$data_array[] = "table_mid_1";
		
		$data_array[] = array("REAL NAME", $dossier['name']);
		$data_array[] = array("STATUS", $dossier['status']);
		$data_array[] = array("SPECIES", $dossier['species']);
		$data_array[] = array("GENDER", $dossier['gender']);
	
		$data_array[] = "table_bot";
	}
	else {
		$data_array[] = "ERROR: OPERATIVE NOT FOUND";
	}
}
else {
	$data_array[] = "ERROR: NOT LOGGED IN";
}
?>