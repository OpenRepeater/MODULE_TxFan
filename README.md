This module is useful to allow the system to activate an external fan for cooling PA units/power supplies/etc that may become heated during long QSO's. 

There are 2 basic opperating modes supported, follow PTT and CountDown.  

The follow PTT method monitors the PTT signals (up to 2x) and when the PTT is active and the module timer fires <discussed more later> it will turn on the GPIO assigned to the fan controller.  When the PTT is then released, the GPIO will be turned off when the next timer itteration fires.  If the timer is really short, and the QSO transmitter has a poor signal that can't hold the squelch open this can cause some pretty severe control signal thrashing that could lead to equipment failures.  This can be smoothed out by extending the PTT hold time setting.

The CountDown method forces the gpio to stay on for a settable number of timer units after the PTT has turned off.  This is useful if there is a need to have no PTT hold time or the fan needs to stay on for some set amount of time after the PTT has ended due to slow migration of heat through heatsinks or etc.  For example, you impiraclly determine the fan needs to stay on for 60 seconds to ensure sufficient cooling has been done.  If the timer is set for minutes accuracy, then the count down would be set to 1.  If the timer is set for seconds, the count down would be set for 60.

Some commentary on the current settings and some implications:
For the immediate future, this module only has access to a 1 minute accuracy timer.  This is a limit of the current released version of svxlink which Open Repeater uses.  The implication of this 1 minute timer is that a PTT event that does not cross over the 1 minute tick event will not be detected by the module and so will not turn on the GPIO.  For such a short QSO (kerchunk or CQ call), this is likely to be okay as little heat would be expected to build up.  

For a longer running QSO, the probability of crossing the 1 minute tick is far more probable and is likely to be detected forcing the fan on.  The count down/follow ptt timer gpio driver will be set as appropriate when this event is detected and reset each time the PTT is active during the 1 minute tick.  Assuming the PTT expires 1 second after the timer, the fan will continue to run for the remaining 59 seconds until the next 1 minute tick comes around again, where the PTT will then be noted as being off, the count down will then decrement each minute until it reaches 0.  You can round up the worst case on time as N+1 minutes, and the minimum as N minutes where N is the count down setting.

The timers have been updated in the trunk versions of svxlink to create a 1 second accuracy timer that can be used by updating the commented out code in the TCL for the timers.  The static behavior will be the same as above, but changed to have a 1 second granularity. 

When a new release of svxlink is created, this module will be updated to use the more accurate 1 second timer settings by default.
