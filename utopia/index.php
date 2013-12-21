<html>
 <head>
  <title>Team Utopia - Result Listing</title>

<link rel="stylesheet" type="text/css" href="utopia.css" media="screen">
<!--<link rel="stylesheet" type="text/css" href="utopiam.css" media="handheld, only screen and (max-device-width: 320px)">-->

</style>
 </head>

<?php $race=$_GET["race"];?>

 <body>

<section id="intro">  
          <header>  
        <h2><?php echo 'Team Utopia Results Listing';?></h2>  
    </header> 
    </section>  
   
 <?php 
	    //Variables for connecting to your database.
            //These variable values come from your hosting account.
            $hostname = "scoreware2.db.11972874.hostedresource.com";
            $username = "scoreware2";
            $dbname = "scoreware2";

            //These variable values need to be changed by you before deploying
            $password = "Ba3542b36!";
            
            //Connecting to your database
            $con=mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Unable to 
            connect to database! Please try again later.");
	    
	    $query="SELECT * FROM races ORDER BY Date";
	    $result=$con->query($query);

		echo '<div style="float: left">';
		echo '<table border="1">';

		$num_rows=mysqli_num_rows($result);

	   while ($result_row = mysqli_fetch_array($result))
           {
		echo '<a href="http://www.truenorth-ia.com/results/result.php?race='.$result_row[0].'">';
		echo $result_row[1].' '.$result_row[2].'</a><br>';
	   }          
?> 


 </body>
</html>
