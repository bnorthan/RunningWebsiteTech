<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 //EN">
<html>

<head>
  <title>Utopia Results</title>
<meta http-equiv="X-UA-Compatible" content="IE=8" >
<link rel="stylesheet" type="text/css" href="turesult.css" media="screen">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script src="../jquery.tablesorter/jquery.tablesorter.js"></script>
<script src="../jquery.tableScroll/jquery.tablescroll.js"></script>
<script src="../3rdParty/galleria/galleria-1.2.9.min.js"></script>
<script src="turesult.js"></script>

</head>

<?php
	// this section of code establishes a connection with a running database
	 
	require '../connect.php';
		
	// read the race info and write the data to the header
	$rd->read_race_info();
?>


<body>

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

	<!-- Result table section -->
	<div id="results_table">

	<!--  add a couple of radios to toggle between just Utopia members and everybody -->
	<input type="radio" name="who" id="utopia" onclick="onclickUtopia(this)" checked ></input>Utopia&nbsp;
	<input type="radio" name="who" id="everybody" onclick="onclickEveryone(this)"></input>Everybody

	<?php 
		echo '<table border="1" id="fullresults" class="tablesorter">';
	
		$rd->build_table_string();
	
		echo '</table>';
	?>
	</div>
	<script>
		// call the java script function that hides all the other results so that only utopia results are initially shown
		onclickUtopia();
	</script>

	<!--  Pictures section -->
	<div id="galleria">
		<?php
			// this section adds the pictures to the galleria tool
	
			// the pictures directory is in the form race_pics
			$pictures_dir='Pictures/'.$race.'_pics';
			
			echo $pictures_dir.'<br>';
			echo $num_pictures.'<br>';
	
			// the pictures are name 1.jpg, 2.jpg, 3.jpg... n.jpg, the thumbs are names 1_thumb.jpg, 2_thumb.jpg...
			for ($i=0;$i<$num_pictures;$i++)
			{
				echo '<a href="'.$pictures_dir.'/'.$i.'.jpg"><img src="'.$pictures_dir.'/'.$i.'_thumb.jpg"></a>';
			}
		?>

		<script>
   	 		Galleria.loadTheme('../3rdParty/galleria/themes/classic/galleria.classic.min.js');
   		    Galleria.run('#galleria');
		</script>
	</div>

</body>
</html>