<link rel="stylesheet" type="text/css" href="results/turesult.css" media="screen">
<?php
	
    $rd->read_race_info();
	
	// Get User ID	
	try
	{
		$user = $facebook->getUser();
	}
	catch (FacebookApiException $e)
	{
		error_log($e);
		$user = null;
	}

	
if ($user) 
{

try 
{
    $user_profile = $facebook->api('/me');
} 
catch (FacebookApiException $e) 
{
    error_log($e);
    $user = null;
}

}


if ($user) {
    $logoutUrl = $facebook->getLogoutUrl();
} else {
    $loginUrl = $facebook->getLoginUrl();
}

$naitik = $facebook->api('/naitik');
?>

<?php if ($user): ?>
<a href="<?php echo $logoutUrl; ?>">Logout</a>
<?php else: ?>
<?php echo "LoginURL:"; var_dump($loginUrl);?>
<div>
 <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>

</div>
<?php endif ?>

<?php if ($user): ?>
<h3>You</h3>
<img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

<h3>You are connected.</h3>
<pre><?php /*print_r($user_profile);*/ ?></pre>
<?php else: ?>
<strong><em>You are not Connected.</em></strong>
<?php endif ?>

<div id="results_table">
<?php $friends = $facebook->api('/me/friends');

		
        /*echo '<ul>';
        foreach ($friends["data"] as $value) {
        	$result_row=$rd->find_runner($value["name"]);
        	
        	if ($result_row)
        	{	
        		$datetime = strtotime($result_row[Time]);
        		
        		// call the utility that parses the time as a race time
        		$time = parse_race_time($datetime);
        		
            	echo '<li>';
            	echo '<div class="pic">';
            	//echo '<tr id='.$id.'><td>'.$result_row[Place].'</td><td>'.$result_row[FirstName].'</td><td>'.$result_row[LastName].'</td><td>'.$result_row[Age].'</td><td>'.$time.'</td><td class="club">'.$result_row[Club].'</td></tr>';
            	//echo $result_row[Place].' '.$result_row[FirstName].' '.$result_row[LastName].' '.$result_row[Age].' '.$time;
            	
            	echo '<img src="https://graph.facebook.com/' . $value["id"] . '/picture"/>';
           	 	echo '</div>';
            	echo '<div class="picName">'.$value["name"].' '.$result_row[Place].' '.$result_row[Age].' '.$time.'</div>'; 
            	echo '</li>';
        	}
        	
        }
        echo '</ul>';*/

		$results = $rd->get_race_results();

		$num_rows=mysqli_num_rows($results);
		$i=0;
	
		echo '<table border="1">';
		
		echo '<thead>';
		echo '<tr>
		<th class="place">Place</th> 
		<th></th>
		<th class="name">First Name</th>
		<th class="name">Last Name</th> 
		<th class="age">Age</th> 
		<th class="time">Time</th>';
		echo '</tr>';
		echo '</thead>';
		
		while ($i<$num_rows)
		{
			$result_row = $results->fetch_assoc();
				
			$firstName=$result_row[FirstName];
			$lastName=$result_row[LastName];
			
			$fullName=$firstName.' '.$lastName;
			
			$match=10;
			$isFriend=false;
			
			foreach ($friends["data"] as $value) 
			{
					
				$match=levenshtein ( $value["name"] , $fullName );	
				
				//echo '<br>'.$value["name"].' '.$result_row[FirstName].' '.$result_row[LastName].' '.$match.'<br>';
				
				if ($match<2)
				{
				//	echo '<br>Match!!'.$value["name"].' '.$result_row[FirstName].' '.$result_row[LastName].' '.$match.'<br>';
					
					//echo '<div class="picName">'.$value["name"].' '.$result_row[Place].' '.$result_row[Age].' '.$time.'</div>';
					$isFriend=true;
					break 1;
				}
			}
			
			// if it is a match add to the table
			if ($match<2)
			{
				$datetime = strtotime($result_row[Time]);
				$time = parse_race_time($datetime);
				
				echo '<tr>';
				echo '<td>'.$result_row[Place].'</td>';
			//	echo '<br>Friend!!'.$value["name"].' '.$result_row[FirstName].' '.$result_row[LastName].' '.$match.'<br>';
				echo '<td><img src="https://graph.facebook.com/' . $value["id"] . '/picture"/></td>';
				
				echo '<td>'.$result_row["FirstName"].'</td><td>'.$result_row["LastName"].'</td><td>'.$result_row[Age].'</td><td>'.$time.'</td>';
			
				echo '</tr>';
			}
			
			$i++;
		}
		echo'</table>';
		
?>
</div>