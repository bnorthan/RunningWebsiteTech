<link rel="stylesheet" type="text/css" href="results/turesults.css" media="screen">

<?php 	

	//echo '<br><br><br><br><br><table border="1" id="racelist">';
	
	$result=$rd->get_race_links("result.php");
	
	$lastmonth=null;
	
	//echo '<tr><th class="racelistdate">Date</th><th>Race</th></tr>';
	
	while ($result_row=$result->fetch_assoc())
	{
		
		$datetime = strtotime($result_row[Date]);

		$month= date('F', $datetime);
		$year = date('Y', $datetime);
		
		if ($month!=$lastmonth)
		{
			if ($lastmonth!=null)
			{
				// close the old table
				echo '</table>';
			}
			
			$lastmonth=$month;
			
			echo '</br>'.$month.' '.$year;
			
			// start the new table
			echo '<br><table border="1" class="racelist">';
			echo '<tr><th class="racelistdate">Date</th><th>Race</th></tr>';
			
		}
		
		$id=$result_row[Identifier];
		$racename = $result_row[Name];
		$city = $result_row[City];
		$state = $result_row[State];
		$date = date( 'F d, Y' , $datetime);
			
		echo '<tr>';
		echo '<td class="racelistdate">'.$date.'</td>';
			
		echo '<td><a href=result.php?race='.$id.'>';
		echo $racename.' '.$city.', '.$state.'</a></td>';
			
		echo '</tr>';
	}
	
	// close the last table
	echo '</table>'
	/*echo '<tr><th class="racelistdate">Date</th><th>Race</th></tr>';
	
	while ($result_row=$result->fetch_assoc())
	{
		$datetime = strtotime($result_row[Date]);
			
		$id=$result_row[Identifier];
		$racename = $result_row[Name];
		$city = $result_row[City];
		$state = $result_row[State];
		$date = date( 'F d, Y' , $datetime);
			
		echo '<tr>';
		echo '<td class="racelistdate">'.$date.'</td>';
			
		echo '<td><a href=result.php?race='.$id.'>';
		echo $racename.' '.$city.', '.$state.'</a></td>';
			
		echo '</tr>';
	}

	echo '</table>'*/;
?>