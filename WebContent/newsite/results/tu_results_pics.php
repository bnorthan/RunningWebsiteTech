<link rel="stylesheet" type="text/css" href="results/turesult.css" media="screen">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script src="jquery.tableScroll/jquery.tablescroll.js"></script>
<script src="3rdParty/galleria/galleria-1.2.9.min.js"></script>
<script src="results/turesult.js"></script>

<header>
	
</header>

<!-- Result table section -->
<div id="results_table">

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

	<!--  add a couple of radios to toggle between just Utopia members and everybody -->
	<input type="radio" name="who" id="utopia" onclick="onclickUtopia(this)" checked ></input>Utopia&nbsp;
	<input type="radio" name="who" id="everybody" onclick="onclickEveryone(this)"></input>Everybody
	
	<?php
	$user_id = $facebook->getUser();
	
    if($user_id) 
    {
    	echo '&nbsp;&nbsp;<img src="images/facebook/FB-f-Logo__blue_29.png">';
    	echo '<input type="radio" name="who" id="friends" onclick="onclickFriend(this)"></input>Facebook Friends';
    	
		//echo '<a href="facebookfind.php?race='.$race.'">Find Facebook Friends</a>';
    }
    else
    {
    	echo '&nbsp;&nbsp;&nbsp;';
    	include "facebook/facebooklogin.php";
    	echo '<a href="' . $login_url . '"><img src="images/facebook/FB-f-Logo__blue_29.png"> 
    	<font color="8888FF">Find friends in race.</font></a><br>';
    	 
    	
    	//echo '<a href="#"> Login with Facebook to find Friends</a>';
    }
    
    ?>
	
	<?php 
		if ($user_id)
		{
			$friends = $facebook->api('/me/friends');
		}
	
		echo '<table border="1" id="fullresults" class="tablesorter">';
	
		//$rd->build_table_string();
		
		$result=$rd->get_race_results();
		
		$num_rows=mysqli_num_rows($result);
		$i=0;
		
		echo '<thead>';
		
		echo '<tr>
		<th class="place">Place</th>
		<th class="photo" style="display:none">Photo</th>
		<th class="name">First Name</th>
		<th class="name">Last Name</th>
		<th class="age">Age</th>
		<th class="time">Time</th>
		<th class="club">Club</th>
		<th class="friend">Friend</th>
		</tr>';
		
		echo '</thead>';
		
		echo '<tbody>';
		
		while ($i<$num_rows)
		{
			$result_row = $result->fetch_assoc();
		
			$datetime = strtotime($result_row[Time]);
		
			// call the utility that parses the time as a race time
			$time = parse_race_time($datetime);
		
			$id='r'.$i;
			
			$firstName=$result_row[FirstName];
			$lastName=$result_row[LastName];
			$fullName=$firstName.' '.$lastName;
			$isFriend=false;
			
			if ($user_id)
			{
			
				foreach ($friends["data"] as $value)
				{	
					$match=levenshtein ( $value["name"] , $fullName );
			
					if ($match<2)
					{
						$isFriend=true;
						break 1;
					}
				}
			}
		
			echo '<tr id='.$id.'>
			<td>'.$result_row[Place].'</td>';
			
			if ($isFriend)
			{
				echo '<td class="photo" style="display:none"><img src="https://graph.facebook.com/' . $value["id"] . '/picture"/></td>';			
			}
			else
			{
				echo '<td class="photo" style="display:none"></td>';
			}
			
			echo '<td>'.$result_row[FirstName].'</td>
			<td>'.$result_row[LastName].'</td>
			<td>'.$result_row[Age].'</td>
			<td>'.$time.'</td>
			<td class="club">'.$result_row[Club].'</td>';
			
			if ($isFriend)
			{
				echo '<td class="friend">friend</td>';
			}
			else 
			{
				echo '<td class="friend">notfriend</td>';
			}
			echo '</tr>';
			
			$i++;
		}
		
		echo '</tbody>';
	
		echo '</table>';
	?>
</div>
	
<script>
	// call the java script function that hides all the other results so that only utopia results are initially shown
	onclickUtopia();
</script>

<!--  Pictures section -->
<div id="galleria_wrap">
 
<?php 
	include_once "photos/jqueryuploader.php";
?>
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
		
		// also there could be pictures added into the database by users... check for these too
		$pictures=$race.'_pics';
		$query="SELECT * FROM $pictures";
		$result=$con->query($query);
		
		// display backwards so user sees their most recently added pictute.
		$backward = array();
		while($row = mysqli_fetch_array($result))
		{
		//	print('I found a result: <pre>'.print_r($row, false).'</pre>'); //debugging purposes
			$backward[] = $row;
		}
		
		$backward = array_reverse($backward);
		
		foreach($backward as $result_row)
		//while ($result_row = mysqli_fetch_array($result))
		{
			echo '<img src="'.$result_row[0].'">';
		}
	?>

	<script>
   		 Galleria.loadTheme('3rdParty/galleria/themes/classic/galleria.classic.min.js');
   	 	Galleria.run('#galleria');
	</script>

</div>
</div>
