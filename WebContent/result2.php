<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 //EN">
<html>

<head>
  <title>Utopia Results</title>
<meta http-equiv="X-UA-Compatible" content="IE=8" >
<link rel="stylesheet" type="text/css" href="result2.css" media="screen">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script src="../jquery.tablesorter/jquery.tablesorter.js"></script>
<script src="../jquery.tableScroll/jquery.tablescroll.js"></script>
<script src="galleria/galleria-1.2.9.min.js"></script>
<script src="result2.js"></script>

</head>

<?php
	// this section of code establishes a connection with a running database
	 
	require 'classes/RunningDatabase.php';
	require 'classes/DateTimeUtilities.php';

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
    
?>

<body>

<div id="galleria_frame">
<header>
	<h1>
	
	<?php 
		// read the race info and write the data to the header
		$rd->read_race_info();
	
		echo $rd->get_name().'<br>';
		
	?>	
	</h1>
	
	<h2>
	<?php 
		echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$rd->get_city().', '.$rd->get_state().', '.$rd->get_date().'<br>';

		// get the number of pictures
		$num_pictures=$rd->get_num_pictures();
	?>
	</h2>
</header>

<div id="galleria">
<?php
	// this section adds the pictures to the galleria tool
	
	// the pictures directory is in the form race_pics
	$pictures_dir=$race.'_pics';
	
	// the pictures are name 1.jpg, 2.jpg, 3.jpg... n.jpg, the thumbs are names 1_thumb.jpg, 2_thumb.jpg...
	for ($i=0;$i<$num_pictures;$i++)
	{
		echo '<a href="'.$pictures_dir.'/'.$i.'.jpg"><img src="'.$pictures_dir.'/'.$i.'_thumb.jpg"></a>';
	}
?>

<script>
    Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('#galleria');
</script>
</div>

</div>

<!--  this section is the results table -->
<div id="results_table">

<!--  add a couple of radios to toggle between just Utopia members and everybody -->
<input type="radio" name="who" id="utopia" onclick="onclickUtopia(this)" checked ></input>Utopia&nbsp;
<input type="radio" name="who" id="everybody" onclick="onclickEveryone(this)"></input>Everybody

<?php 
	    
	// get the results from the database and put them in a html table
	$query="SELECT * FROM $race ORDER BY Place";
	$result=$con->query($query);	
	echo '<table border="1" id="fullresults" class="tablesorter">';

	$num_rows=mysqli_num_rows($result);
	$i=0;

	echo '<thead>';
	echo '<tr><th class="place">Place</th><th class="name">First Name</th><th class="name">Last Name</th><th class="age">Age</th><th class="time">Time</th><th class="club">Club</th></tr>';
	echo '</thead>';
	
	echo '<tbody>';
	while ($i<$num_rows)
	{
		$result_row = $result->fetch_assoc();
		
		$datetime = strtotime($result_row[Time]);

		// call the utility that parses the time as a race time
		$time = parse_race_time($datetime);
		
		$id='r'.$i;
		
		echo '<tr id='.$id.'><td>'.$result_row[Place].'</td><td>'.$result_row[FirstName].'</td><td>'.$result_row[LastName].'</td><td>'.$result_row[Age].'</td><td>'.$time.'</td><td class="club">'.$result_row[Club].'</td></tr>';
		$i++;
	}     
	echo '</tbody>';
	echo '</table>';
?>

<script>
	// call the java script function that hides all the other results so that only utopia results are initially shown
	onclickUtopia();
</script>
	
<script>
// call the 3rd party script that makes the result sortable
$(document).ready(function() 
    { 
        $("#fullresults").tablesorter(); 
        //$("#fullresults").tableScroll({height:600});
    } 
);
</script>

</div>

</body>
</html>



