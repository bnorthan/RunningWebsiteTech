<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 //EN">
<html>
 <head>
  <title>Utopia Results</title>
<meta http-equiv="X-UA-Compatible" content="IE=8" >
<link rel="stylesheet" type="text/css" href="utopia.css" media="screen">
<!--<link rel="stylesheet" type="text/css" href="utopiam.css" media="handheld, only screen and (max-device-width: 320px)"> -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script src="galleria/galleria-1.2.9.min.js"></script>

<style>
    #galleria{ width: 800px; height: 350px; background: #000 }
</style>

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

	$query="SELECT * FROM races WHERE Identifier='$race'";
	$result=$con->query($query);
	    
	$result_row = mysqli_fetch_array($result);
	echo $result_row[1].', '.$result_row[2].', '.$result_row[3].'<br>';

?>

</h2>  
    </header> 
    </section>  

<div style="padding-bottom:20px">
<div id="galleria">

<?php
	$pictures=$race.'_pics';
	$query="SELECT * FROM $pictures";
	$result=$con->query($query);

	while ($result_row = mysqli_fetch_array($result))
        {
		echo '<img src="'.$result_row[0].'">';
	}
?>

</div>

<script>
    Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('#galleria');
</script>

</div> 
   
 <?php 
	    

	    $query="SELECT * FROM $race ORDER BY Place";
	    $result=$con->query($query);

	echo '<div style="float: left">';
	echo '<table border="1">';

$num_rows=mysqli_num_rows($result);
$i=0;

echo '<tr><th>Place</th><th>Name</th><th>Time</th></tr>';

	   while ($i<$num_rows/2)
           {
		$result_row = mysqli_fetch_array($result);
		echo '<tr><td>'.$result_row[1].'</td><td>'.$result_row[0].'</td><td>'.$result_row[2].'</td></tr>';
		$i++;
	   }     

	   
echo '</table>';
echo '</div>';

echo '<div style="float: left;padding-left:50px">';
echo '<table border="1">';

echo '<tr><th>Place</th><th>Name</th><th>Time</th></tr>';

	   while ($result_row = mysqli_fetch_array($result))
           {
		echo '<tr><td>'.$result_row[1].'</td><td>'.$result_row[0].'</td><td>'.$result_row[2].'</td></tr>';
	   }          
     
	   
echo '</table>';
echo '</div>';

?> 



 </body>
</html>
