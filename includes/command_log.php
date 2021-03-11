<?php
if(isset($_SESSION['username'])) {
	if($command_array[1] == '/C') {
		file_put_contents('dice_log.log', '');
		$data_array[] = "LOG CLEARED";
	}
	else {
		// Dice table header
		$data_array[] = " &#24;" . str_pad('', 120, '&#18;') . "&#24;" . str_pad('', 80, '&#18;') . "&#24;" . str_pad('', 40, '&#18;') . "&#24;" . str_pad('', 15, '&#18;') . "&#24;" . str_pad('', 15, '&#18;') . "&#24;" . str_pad('', 15, '&#18;') . "&#24;" . str_pad('', 15, '&#18;') . "&#24;" . str_pad('', 15, '&#18;') . "&#24;" . str_pad('', 15, '&#18;') . "&#24;" . str_pad('', 15, '&#18;') . "&#24;" . str_pad('', 20, '&#18;') . "&#24; ";
		$data_array[] = " &#25;" . str_pad("NAME", 24, ' ') . "&#25;" . str_pad("ID", 16, ' ') . "&#25;" . str_pad("TIME", 8, ' ') . "&#25;  #&#25;  1&#25;  2&#25;  3&#25;  4&#25;  5&#25;  6&#25;SUM &#25; ";
		$data_array[] = " &#21;" . str_pad('', 120, '&#18;') . "&#15;" . str_pad('', 80, '&#18;') . "&#15;" . str_pad('', 40, '&#18;') . "&#15;" . str_pad('', 15, '&#18;') . "&#15;" . str_pad('', 15, '&#18;') . "&#15;" . str_pad('', 15, '&#18;') . "&#15;" . str_pad('', 15, '&#18;') . "&#15;" . str_pad('', 15, '&#18;') . "&#15;" . str_pad('', 15, '&#18;') . "&#15;" . str_pad('', 15, '&#18;') . "&#15;" . str_pad('', 20, '&#18;') . "&#22; ";
		
		// Print log
		$dice_history = file('dice_log.log', FILE_IGNORE_NEW_LINES);
		
		for($i = 0; $i < 21; $i++) {
			if($dice_history[$i]) {
				$data_array[] = $dice_history[$i];
			}
			else {
				$data_array[] = " &#25;" . str_pad('', 24, ' ') . "&#25;" . str_pad('', 16, ' ') . "&#25;" . str_pad('', 8, ' ') . "&#25;" . str_pad('', 3, ' ', STR_PAD_LEFT) . "&#25;" . str_pad('', 3, ' ', STR_PAD_LEFT) . "&#25;" . str_pad('', 3, ' ', STR_PAD_LEFT) . "&#25;" . str_pad('', 3, ' ', STR_PAD_LEFT) . "&#25;" . str_pad('', 3, ' ', STR_PAD_LEFT) . "&#25;" . str_pad('', 3, ' ', STR_PAD_LEFT) . "&#25;" . str_pad('', 3, ' ', STR_PAD_LEFT) . "&#25;" . str_pad('', 4, ' ', STR_PAD_LEFT) . "&#25; ";
			}
		}
		
		// Dice table footer
		$data_array[] = " &#23;" . str_pad('', 120, '&#18;') . "&#23;" . str_pad('', 80, '&#18;') . "&#23;" . str_pad('', 40, '&#18;') . "&#23;" . str_pad('', 15, '&#18;') . "&#23;" . str_pad('', 15, '&#18;') . "&#23;" . str_pad('', 15, '&#18;') . "&#23;" . str_pad('', 15, '&#18;') . "&#23;" . str_pad('', 15, '&#18;') . "&#23;" . str_pad('', 15, '&#18;') . "&#23;" . str_pad('', 15, '&#18;') . "&#23;" . str_pad('', 20, '&#18;') . "&#23; ";
	}
}
else {
	$data_array[] = "ERROR: ACCESS DENIED - LOG IN TO CONTINUE";
}
?>