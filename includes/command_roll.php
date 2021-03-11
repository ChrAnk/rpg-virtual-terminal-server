<?php
if(isset($_SESSION['username'])) {
	$break = false;
	
	$dice_count = (int)$command_array[1];
	$dice_result = array(0, 0, 0, 0, 0, 0, 0);
	
	if(is_int($dice_count) && $dice_count > 0 && $dice_count <= 100) {
		for($i = 0; $i < $dice_count; $i++) {
			$dice_result[rand(1, 6)]++;
		}
		
		$dice_result[0] = $dice_result[1] * 1 + $dice_result[2] * 2 + $dice_result[3] * 3 + $dice_result[4] * 4 + $dice_result[5] * 5 + $dice_result[6] * 6;
		
		$dice_output = " &#25;" . str_pad($_SESSION['username'], 24, ' ');
		$dice_output .= "&#25;" . $_SESSION['user_id'];
		$dice_output .= "&#25;" . $time;
		$dice_output .= "&#25;" . str_pad($dice_count, 3, ' ', STR_PAD_LEFT);
		$dice_output .= "&#25;" . str_pad($dice_result[1], 3, ' ', STR_PAD_LEFT);
		$dice_output .= "&#25;" . str_pad($dice_result[2], 3, ' ', STR_PAD_LEFT);
		$dice_output .= "&#25;" . str_pad($dice_result[3], 3, ' ', STR_PAD_LEFT);
		$dice_output .= "&#25;" . str_pad($dice_result[4], 3, ' ', STR_PAD_LEFT);
		$dice_output .= "&#25;" . str_pad($dice_result[5], 3, ' ', STR_PAD_LEFT);
		$dice_output .= "&#25;" . str_pad($dice_result[6], 3, ' ', STR_PAD_LEFT);
		$dice_output .= "&#25;" . str_pad($dice_result[0], 4, ' ', STR_PAD_LEFT) . "&#25; ";
		
		// Update log
		$dice_file = file_get_contents('dice_log.log');
		$dice_file = $dice_output . "\n" . $dice_file;
		file_put_contents('dice_log.log', $dice_file);
		
		// Reduce log to 21 lines
		$dice_file_array = file('dice_log.log');
		$dice_file_lines = count($dice_file_array);
		for($i = 0; $i < $dice_file_lines - 21; $i++) {
			array_pop($dice_file_array);
		}
		file_put_contents('dice_log.log', implode('', $dice_file_array));
	}
	else {
		$data_array[] = "ERROR: USE BETWEEN 1 AND 35 DICE";
		$break = true;
	}
}
else {
	$data_array[] = "ERROR: ACCESS DENIED - LOG IN TO CONTINUE";
	$break = true;
}
?>