<?php
/* 
 *	Settings Page for Module 
 *	
 *	This is included into a full page wrapper to be displayed. 
 */
?>

<!-- BEGIN FORM CONTENTS -->
	<fieldset>
		<legend>Module Settings</legend>
		  <div class="control-group">
			<label class="control-label" for="mode">Fan Mode</label>
			<div class="controls">
			  <input class="input-xlarge" id="mode" type="text" name="mode" value="<?php echo $moduleSettings['mode']; ?>">
			</div>
		    <span class="help-inline">Select the operating mode "FOLLOW_PTT" or "COUNT_DOWN"</span>
		  </div>
	
		  <div class="control-group">
			<label class="control-label" for="delay">Delay</label>
			<div class="controls">
			  <input class="input-xlarge" id="delay" type="text" name="delay" value="<?php echo $moduleSettings['delay']; ?>">
			</div>
		    <span class="help-inline">Delay in seconds until fan turns on when set to "COUNT_DOWN"</span>
		  </div>

		  <div class="control-group">
			<label class="control-label" for="ptt1_gpio">PTT GPIO Pin(s)</label>
			<div class="controls">
			  <input class="input-xlarge" id="ptt1_gpio" type="text" name="ptt1_gpio" value="<?php echo $moduleSettings['ptt1_gpio']; ?>">
			  <input class="input-xlarge" id="ptt2_gpio" type="text" name="ptt2_gpio" value="<?php echo $moduleSettings['ptt2_gpio']; ?>">
			</div>
		    <span class="help-inline">GPIOs where the PTT(s) can be monitored. 2 paths are required, if there is only 1 PTT, assign them the same GPIO.</span>
		  </div>

		  <div class="control-group">
			<label class="control-label" for="fan_gpio">Fan GPIO Pin</label>
			<div class="controls">
			  <input class="input-xlarge" id="fan_gpio" type="text" name="fan_gpio" value="<?php echo $moduleSettings['fan_gpio']; ?>">
			</div>
		    <span class="help-inline">GPIO pin used to control fan circuit.</span>
		  </div>

	
	
		  <div class="control-group">
			<label class="control-label" for="fan_gpio_active_state"> Fan Active High or Low State: </label>
			<div class="controls">
			  <input type="radio" name="fan_gpio_active_state" value="high" <?php if ($moduleSettings['fan_gpio_active_state'] == "high") { echo 'checked="checked"'; } ?>><span> Active High </span>
			  <input type="radio" name="fan_gpio_active_state" value="low" <?php if ($moduleSettings['fan_gpio_active_state'] == "low") { echo 'checked="checked"'; } ?>><span> Active Low </span>
			</div>
			  <span class="help-inline">This setting is dependent upon they hardware/circuit design your are using. Active High enables the fan gpio pin with +3.3 volts. Active Low enables by setting the GPIO pin to ground (0 volts).</span>
		  </div>
	
	</fieldset>					
	
<!-- END FORM CONTENTS -->