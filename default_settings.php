<?php
/*
* This is the file that gets called for this module when OpenRepeater first
* installs the mdoule. It adds the default settings for the module defined in
* the PHP array below into the database in the moduleOptions field in the
* modules table. This information is serialized in the database. The variables
* that should be defined here are the same variables that are used in the
* settings form. Again, it is what is stored in the database as options and
* not the variables that the SVXLink code expects to see in the generated 
* config file for the module.
*/

$default_settings = [
    'mode' => 'FOLLOW_PTT',
    'hysteresis' => '20',
    'delay' => '30',
    'ptt1_gpio' => '',
    'ptt2_gpio' => '',
    'fan_gpio' => '24',
    'fan_gpio_active_state' => 'low',
];
?>