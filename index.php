<!DOCTYPE html>

<html>
	<head>
		<title>Communication Terminal</title>
		
		<link rel="stylesheet" href="styles.css" type="text/css">
		<link rel="preload" href="glass_tty_vt220.ttf" as="font" type="font/ttf" crossorigin>
		
		<script>
var power_status = false;

function send_command(command = false) {
	document.getElementById('output').innerHTML = '';
	
	var ajax_request = new XMLHttpRequest();
	
	ajax_request.onreadystatechange = function() {
		if(ajax_request.readyState == 4) {
			document.getElementById('output').innerHTML = ajax_request.responseText;
		}
	}
	
	if(!command) {
		var command = document.getElementById('command').value;
	}
	
	ajax_request.open('POST', 'server.php', true);
	ajax_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax_request.send('command=' + encodeURIComponent(command));
	
	document.getElementById('command').value = '';
}

function command_uppercase() {
	var command = document.getElementById('command');
	
	command.value = command.value.toUpperCase();
}

function toggle_power(power_status) {
	var text = document.getElementById('text');
	var command_line = document.getElementById('command_line');
	var monitor = document.getElementById('monitor');
	var button_power = document.getElementById('button_power');
	var command = document.getElementById('command');
	
	if(!power_status) {
		text.style.display = 'block';
		command_line.style.display = 'block';
		monitor.classList.add('on');
		button_power.classList.add('on');
		command.focus();
		send_command('connect');
		
		return true;
	}
	else {
		text.style.display = 'none';
		command_line.style.display = 'none';
		monitor.classList.remove('on');
		button_power.classList.remove('on');
		
		return false;
	}
}

function reset(power_status) {
	var button_reset = document.getElementById('button_reset');
	
	if(power_status) {
		send_command('logout');
		toggle_power(true);
		setTimeout(function(){
			toggle_power(false);
			}, 1500);
		
	}
}
		</script>
	</head>
	
	<body>
		<section id="terminal">
			<div id="monitor">
				<div id="text">
					<pre id="output"></pre>
				</div>
				
				<form method="post" onsubmit="send_command();return false;" autocomplete="off">
					<label id="command_line">COMMAND ==>
						<input type="text" id="command" oninput="command_uppercase()">
					</label>
				</form>
			</div>
			
			<div id="panel">
				<button type="button" onclick="power_status = toggle_power(power_status);" id="button_power">Power</button>
				
				<button type="button" onclick="reset(power_status);" id="button_reset">Reset</button>
			</div>
		</section>
	</body>
</html>