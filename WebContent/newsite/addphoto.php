<!doctype html>
<html>
<head><title>We are back</title>
<link rel="stylesheet" type="text/css" href="main.css" media="screen">
<?php $race=$_GET["race"];?>
<meta http-equiv="refresh" content="3;url=result.php?race=<?php echo $race;?>" />
</head>

<body>

<?php 
	include_once "sections/header.html";
	include_once "sections/nav.html";
?>

<div style="clear:left">
<?php 
	include_once "photos/add.php";
?>

<li><a href="result.php?race=<?php echo $race;?>">Back to results</a></li>  
</div>

</body>