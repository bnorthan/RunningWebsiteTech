<html>
 <head>
  <title>Utopia Results</title>

<link rel="stylesheet" type="text/css" href="grandprix.css" media="screen">

</style>
 </head>

<?php 

$race=$_GET["race"];

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

	    
	             
?>

 <body>

<section id="intro">  
          <header>  
        <h2>
<?php 

	$query="SELECT * FROM gp_races WHERE Identifier='$race'";
	$result=$con->query($query);
	    
	$result_row = mysqli_fetch_array($result);
	echo $result_row[1].', '.$result_row[2].', '.$result_row[3].'<br>';

?>

</h2>  
    </header> 
    </section>  

   
 <?php 
	    
	



	echo '<div style="float: left">';
	echo '<table border="1">';


$query="SELECT Name FROM $race WHERE Category = 'Male 1-29'";
	    $resultM20=$con->query($query);

  	    $query="SELECT Name FROM $race WHERE Category = 'Male 30-39'";
	    $resultM30=$con->query($query);
	
	    $query="SELECT Name FROM $race WHERE Category = 'Male 40-49'";
	    $resultM40=$con->query($query);
	
	    $query="SELECT Name FROM $race WHERE Category = 'Male 50-59'";
	    $resultM50=$con->query($query);

            $query="SELECT Name FROM $race WHERE Category = 'Male 60-69'";
	    $resultM60=$con->query($query);

	    $query="SELECT Name FROM $race WHERE Category = 'Male 70-99'";
	    $resultM70=$con->query($query);

	     $scoring=array(12,10,8,7,6,5,4,3,2,1);


echo '<table border="1">';

echo '<tr><th> </th> <th></th><th>Male Open</th><th>Male 30-39</th><th>Male 40-49</th><th>Male 50-59</th><th>Male 60-69</th><th>Male 70-99</th></tr>';

	   //while ($result_row = $result->fetchRow(DB_FETCHMODE_ASSOC))
           //while($result_row = mysqli_fetch_array($result))
	   for ($i=1;$i<=10;$i++)
	   {
		$result_rowM20 = mysqli_fetch_array($resultM20);
		$result_rowM30 = mysqli_fetch_array($resultM30);
		$result_rowM40 = mysqli_fetch_array($resultM40);
		$result_rowM50 = mysqli_fetch_array($resultM50);
		$result_rowM60 = mysqli_fetch_array($resultM60);
		$result_rowM70 = mysqli_fetch_array($resultM70);
		
		echo '<tr><td>'.$i.'</td><td>'.$scoring[$i-1].'</td>';
		
		if ($result_rowM20!=null) echo '<td>'.$result_rowM20[0] . '</td>';
		else echo '<td></td>';		

		if ($result_rowM30!=null) echo '<td>'.$result_rowM30[0] . '</td>';
		else echo '<td></td>';
	
		if ($result_rowM40!=null) echo '<td>'.$result_rowM40[0] . '</td>';
		else echo '<td></td>';

		if ($result_rowM50!=null) echo '<td>'.$result_rowM50[0] . '</td>';
		else echo '<td></td>';

		if ($result_rowM60!=null) echo '<td>'.$result_rowM60[0] . '</td>';
		else echo '<td></td>';

		if ($result_rowM70!=null) echo '<td>'.$result_rowM70[0] . '</td>';
		else echo '<td></td>';
			
		//echo '<tr>';
		//echo '<td>'.$result_row[0] . '<td/><td>' . $result_row[1] . '<td/><td>' . $result_row[2] . '<td/>';
		//echo '<td>'.$result_row[0] . '<td/>';//<td>' . $result_row[1] . '<td/><td>' . $result_row[2] . '<td/>';
	   	//echo '</tr>';
	   }          
	   
echo '</table>';
echo '</div?';
echo '<br><br>';


	echo '<div style="float: left">';
	echo '<table border="1">';


$query="SELECT Name FROM $race WHERE Category = 'Female 1-29'";
	    $resultM20=$con->query($query);

  	    $query="SELECT Name FROM $race WHERE Category = 'Female 30-39'";
	    $resultM30=$con->query($query);
	
	    $query="SELECT Name FROM $race WHERE Category = 'Female 40-49'";
	    $resultM40=$con->query($query);
	
	    $query="SELECT Name FROM $race WHERE Category = 'Female 50-59'";
	    $resultM50=$con->query($query);

            $query="SELECT Name FROM $race WHERE Category = 'Female 60-69'";
	    $resultM60=$con->query($query);

	    $query="SELECT Name FROM $race WHERE Category = 'Female 70-99'";
	    $resultM70=$con->query($query);

	     $scoring=array(12,10,8,7,6,5,4,3,2,1);


echo '<table border="1">';

echo '<tr><th> </th> <th></th><th>Female Open</th><th>Female 30-39</th><th>Female 40-49</th><th>Female 50-59</th><th>Female 60-69</th><th>Female 70-99</th></tr>';

	   //while ($result_row = $result->fetchRow(DB_FETCHMODE_ASSOC))
           //while($result_row = mysqli_fetch_array($result))
	   for ($i=1;$i<=10;$i++)
	   {
		$result_rowM20 = mysqli_fetch_array($resultM20);
		$result_rowM30 = mysqli_fetch_array($resultM30);
		$result_rowM40 = mysqli_fetch_array($resultM40);
		$result_rowM50 = mysqli_fetch_array($resultM50);
		$result_rowM60 = mysqli_fetch_array($resultM60);
		$result_rowM70 = mysqli_fetch_array($resultM70);
		
		echo '<tr><td>'.$i.'</td><td>'.$scoring[$i-1].'</td>';
		
		if ($result_rowM20!=null) echo '<td>'.$result_rowM20[0] . '</td>';
		else echo '<td></td>';		

		if ($result_rowM30!=null) echo '<td>'.$result_rowM30[0] . '</td>';
		else echo '<td></td>';
	
		if ($result_rowM40!=null) echo '<td>'.$result_rowM40[0] . '</td>';
		else echo '<td></td>';

		if ($result_rowM50!=null) echo '<td>'.$result_rowM50[0] . '</td>';
		else echo '<td></td>';

		if ($result_rowM60!=null) echo '<td>'.$result_rowM60[0] . '</td>';
		else echo '<td></td>';

		if ($result_rowM70!=null) echo '<td>'.$result_rowM70[0] . '</td>';
		else echo '<td></td>';
			
		//echo '<tr>';
		//echo '<td>'.$result_row[0] . '<td/><td>' . $result_row[1] . '<td/><td>' . $result_row[2] . '<td/>';
		//echo '<td>'.$result_row[0] . '<td/>';//<td>' . $result_row[1] . '<td/><td>' . $result_row[2] . '<td/>';
	   	//echo '</tr>';
	   }          
	   
echo '</table>';
echo '</div?';














?> 


 </body>
</html>
