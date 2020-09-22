<?php
if(isset($_REQUEST["action"]))
if($_REQUEST["action"] == "play")
{
?>
<embed src="Kalimba.mp3" autostart="true" loop="false" style="width:5px; height:2px;">
<?php
}
?>