<?php
	// this section of code establishes a connection with a running database
	 
	require 'classes/RunningDatabase.php';
	require 'classes/DateTimeUtilities.php';

	$race=$_GET["race"];
	
	//Variables for connecting to your database.
    //These variable values come from your hosting account.
    $hostname = "TUresults.db.12069169.hostedresource.com";
    $username = "TUresults";
    $dbname = "TUresults";
    
    //These variable values need to be changed by you before deploying
    $password = "SwissMiss2007!";
  
	$rd=new RunningDatabase($race, $hostname, $username, $dbname, $password);
	
	$con = $rd->get_connection();
	
?>   