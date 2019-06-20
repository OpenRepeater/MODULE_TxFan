<?php
/*
* This is the file that gets called for this module when OpenRepeater rebuilds the configuration files for SVXLink.
* Settings for the config file are created as a PHP associative array, when the file is called it will convert it into
* the requiried INI format and write the config file to the appropriate location with the correct naming.
*/

// Build Config
$module_config_array['Module'.$cur_mod['svxlinkName']] = [
	'NAME' => $cur_mod['svxlinkName'],
	'ID' => $cur_mod['svxlinkID'],
	'PLUGIN_NAME' => 'Tcl',				
];

# MODE: Select the operating mode "FOLLOW_PTT" or "COUNT_DOWN"
$module_config_array['Module'.$cur_mod['svxlinkName']] += [
	'MODE' => 'FOLLOW_PTT',
	'DELAY' => '1',
];

# Path in the file system where the digital inputs can be monitored
# 2 paths are required, if there is only 1 PTT, assign them the same GPIO.
$module_config_array['Module'.$cur_mod['svxlinkName']] += [
	'PTT_PATH_1' => '/sys/class/gpio/gpio506/value',
	'PTT_PATH_2' => '/sys/class/gpio/gpio506/value',
];

# Fan GPIO
$module_config_array['Module'.$cur_mod['svxlinkName']] += [
	'FAN_GPIO' => '/sys/class/gpio/gpio507/value',
];


/*
[ModuleTxFan]
NAME=TxFan
PLUGIN_NAME=Tcl

#Select the operating mode "FOLLOW_PTT" or "COUNT_DOWN"
#MODE="FOLLOW_PTT"
MODE="COUNT_DOWN"

#Number of seconds to delay during COUNT_DOWN mode
DELAY=10

# Path in the file system where the digital inputs can be monitored
# 2 paths are required, if there is only 1 PTT, assign them the same GPIO.
PTT_PATH_1="/sys/class/gpio/gpio506/value"
PTT_PATH_2="/sys/class/gpio/gpio507/value"

FAN_GPIO="/sys/class/gpio/gpio497/value"
*/
?>
