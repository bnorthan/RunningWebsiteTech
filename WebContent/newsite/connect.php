<?php
	// this section of code establishes a connection with a running database
	 
	require 'common/RunningDatabase.php';
	require 'common/DateTimeUtilities.php';
	require 'databaseinfo.php';
	
	$race=$_GET["race"];
	
	$rd=new RunningDatabase($race, $hostname, $username, $dbname, $password);
	
	$con = $rd->get_connection();
	
?>   