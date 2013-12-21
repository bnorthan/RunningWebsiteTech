<?php 
function parse_race_time($datetime)
{
	//$time= date('G:i:s', $datetime);
	//return $time;
	$hour = date('G', $datetime);
	
	
	if ($hour=="0")
	{
		return date('i:s', $datetime);
	
	}
	else
	{
		return date('G:i:s', $datetime);	
	}
}
?>