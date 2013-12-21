<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 //EN">
<html>

<head>
  <title>HMRRC Grand Prix Results</title>
</head>

<body>
	HMRRC Grand Prix Result<br><br>
<?php
	// this section of code establishes a connection with a running database
	 
	require 'classes/RunningDatabase.php';
	require 'classes/DateTimeUtilities.php';
	require 'classes/GrandPrix.php';

	$race=$_GET["race"];
	
	//Variables for connecting to your database.
    //These variable values come from your hosting account.
    $hostname = "scoreware3.db.11972874.hostedresource.com";
    $username = "scoreware3";
    $dbname = "scoreware3";
    
    //These variable values need to be changed by you before deploying
    $password = "Ba3542b36!";
  
	$rd=new RunningDatabase($race, $hostname, $username, $dbname, $password);
	
	$con = $rd->get_connection();
	
	$gp = new GrandPrix($con, $race);
	
	$gp->construct_mens_table();
	echo('<br><br>');
	$gp->construct_womens_table();
	
    
?>
</body>