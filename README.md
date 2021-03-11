# rpg-virtual-terminal-server
Cyperpunk themed RPG online dice roller

## DESCRIPTION
This is a dice roller for online role playing games. It can handle up to 100 D6 and 21 user profiles.

## INSTALLATION
1. Modify the array $operatives in the file includes/class_operative_handler.php to add all players (up to 21).
2. Place the files in the desired folder on a server running PHP.

## DETAILED DESCRIPTION
The dice roller has two parts:

### FRONT-END
* index.html
  * Sends AJAX request to server.php
* styles.css
* glass_tty_vt220.ttf
  * VT220-style font created by Viacheslav Slavinsky: https://github.com/svofski/glasstty/blob/master/Glass_TTY_VT220.ttf

### BACK-END
* server.php
  * Handles AJAX requests from index.html. Commands are handled as separate includes. Screen images are built using control characters based on the return value from the different commands.
* includes/class_operatives_handler.php
  * Stores user profiles, and handles requests for credentials and user information.
* includes/command_about.php
* includes/command_connect.php
  * Called automatically when user presses power button or reset.
* includes/command_dossier.php
  * Returns in-game information about a player based on username.
* includes/command_help.php
* includes/command_log.php
  * Returns the last up to 21 dice rolls.
* includes/command_login.php
  * Sets session when correct username and password are entered, and user is an active operative.
* includes/command_logout.php
* includes/command_operatives.php
  * Returns either all, or only active or terminated, players.
* includes/command_play.php
* includes/command_roll.php
  * Rolls between 1 and 100 D6 and stores the line in the dice roll log.
* dice_log.log
  * Log file used to store and retrieve dice rolls. Is created automatically by the script.
