<?php
date_default_timezone_set('UTC');

include('includes/class_operative_handler.php');
$operative_handler = new operative_handler();

function return_screen($data_array, $time = 'TIMEOUT ') {
	if(isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$user_id = $_SESSION['user_id'];
	}
	else {
		$username = 'GUEST';
		$user_id = 'GUEST';
	}
	
	// Header
	$screen = "&#24;" . str_pad('', 435, '&#18;') . "&#24;\n";
	$screen .= "&#25;OPERATIVE: " . str_pad($username, 21, ' ') . " ID: " . str_pad($user_id, 35, ' ') . " TIME: ". $time . "&#25;\n";
	$screen .= "&#21;" . str_pad('', 435, '&#18;') . "&#22;\n";
	
	// Contents
	for($i = 0; $i < 25; $i++) {
		switch($data_array[$i]) {
			case 'table_top_1': // Inner table header top with full-width header
				$screen .= "&#25; &#24;" . str_pad('', 415, '&#18;') . "&#24; &#25;\n";
				break;
				
			case 'table_mid_1': // Inner table header bottom with full-width header
				$screen .= "&#25; &#21;" . str_pad('', 205, '&#18;') . "&#24;" . str_pad('', 205, '&#18;') . "&#22; &#25;\n";
				break;
				
			case 'table_top_2': // Inner table header top with divided header
				$screen .= "&#25; &#24;" . str_pad('', 205, '&#18;') . "&#24;" . str_pad('', 205, '&#18;') . "&#24; &#25;\n";
				break;
				
			case 'table_mid_2': // Inner table header bottom with divided header, as well as mid-section
				$screen .= "&#25; &#21;" . str_pad('', 205, '&#18;') . "&#15;" . str_pad('', 205, '&#18;') . "&#22; &#25;\n";
				break;
				
			case 'table_bot': // Inner table bottom
				$screen .= "&#25; &#23;" . str_pad('', 205, '&#18;') . "&#23;" . str_pad('', 205, '&#18;') . "&#23; &#25;\n";
				break;
				
			default: // Fills in contents (array for inner table, string for regular contents). Automatically fills in blank lines.
				if(is_array($data_array[$i])) {
					$screen .= "&#25; &#25;" . str_pad($data_array[$i][0], 41, ' ') . "&#25;" . str_pad($data_array[$i][1], 41, ' ') . "&#25; &#25;\n";
				}
				else {
					$screen .= "&#25;" . str_pad($data_array[$i], 87, ' ') . "&#25;\n";
				}
		}
	}
	
	// Footer
	$screen .= "&#23;" . str_pad('', 435, '&#18;') . "&#23;\n";
	
	return $screen;
}


if($_SERVER['REQUEST_METHOD'] === 'POST') {
	session_start();
	
	$time = date('H:i:s');
	
	$command_array = explode(' ', strtoupper(htmlentities($_POST['command'], ENT_QUOTES, 'UTF-8')));
	
	
	// Write each screen line to $data_array
	$data_array = array();
	
	
	switch($command_array[0]) {
		case 'CONNECT':
			include('includes/command_connect.php');
			break;
			
		case 'DOSSIER':
			include('includes/command_dossier.php');
			break;
			
		case 'LOGIN':
			include('includes/command_login.php');
			break;
			
		case 'LOGOUT':
			include('includes/command_logout.php');
			break;
			
		case 'OPERATIVES':
			include('includes/command_operatives.php');
			break;
			
		case 'ROLL':
			include('includes/command_roll.php');
			if($break) {
				break;
			}
			// No break if no error to fall down to displaying the log with the result of the dice roll
		
		case 'LOG':
			include('includes/command_log.php');
			break;
			
		case 'HELP':
			include('includes/command_help.php');
			break;
			
		case 'ABOUT':
			include('includes/command_about.php');
			break;
			
		case 'PLAY':
			include('includes/command_play.php');
			break;
			
		default:
			$data_array[] = "ERROR: UNKNOWN COMMAND";
	}
	
	echo return_screen($data_array, $time);
}
?>