<html>
 <head>
  <title>PHP Test</title>

<link rel="stylesheet" type="text/css" href="grandprix.css">
</style>

 </head>

  <section id="intro">  
<header>  
        <h2>SEFCU 5 km, September 2, 2013</h2>  
    </header> 
    </section>  
 <body>
 <?

//php echo '<p>Sefcu 5 km, September 2, 2013</p>'; 

$race=$_GET["race"];

//Variables for connecting to your database.
            //These variable values come from your hosting account.
            $hostname = "bnorthan2.db.10408148.hostedresource.com";
            $username = "bnorthan2";
            $dbname = "bnorthan2";

            //These variable values need to be changed by you before deploying
            $password = "Ba3542b36!";
            $usertable = "your_tablename";
            $yourfield = "your_field";
        
            //Connecting to your database
            $con=mysqli_connect($hostname, $username, $password, $dbname);
// OR DIE ("Unable to 
  //          connect to database! Please try again later.");

	    //mysql_select_db($dbname);

	    //$create="CREATE TABLE Greetings(Message CHAR(20))";
	    $query="SELECT Name FROM $race WHERE CAT = 'Male 1-29'";
	    $resultM20=$con->query($query);

  	    $query="SELECT Name FROM $race WHERE CAT = 'Male 30-39'";
	    $resultM30=$con->query($query);
	
	    $query="SELECT Name FROM $race WHERE CAT = 'Male 40-49'";
	    $resultM40=$con->query($query);
	
	    $query="SELECT Name FROM $race WHERE CAT = 'Male 50-59'";
	    $resultM50=$con->query($query);

            $query="SELECT Name FROM $race WHERE CAT = 'Male 60-69'";
	    $resultM60=$con->query($query);

	    $query="SELECT Name FROM $race WHERE CAT = 'Male 70-99'";
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

?> 


 </body>
</html>
