<?php
	include_once "facebook/facebookconnect.php";
?>
<!doctype html>
<html>
<head><title>We are back</title>
<link rel="stylesheet" type="text/css" href="main.css" media="screen">
</head>

<body>

<?php 
	include_once "sections/header.html";
	include_once "sections/nav.html";
	include_once "facebook/facebooklogin.php";
?>

Click <a href="https://www.facebook.com/groups/122532785222/">here</a> to go to go to our facebook page.<br>
<br>
Here is a look at the latest discussions on facebook...

<?php 
	include_once "facebook/facebook_feed.php";
?>

</body>