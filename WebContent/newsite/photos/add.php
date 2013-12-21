<?php 
 
 include_once "connect.php";
 //This is the directory where images will be saved 
 $race=$_GET["race"];
 
 echo 'race is: '.$race.'<br>';
 
 $target = "photos/$race/"; 
 
 if (!file_exists($target))
 {
 	mkdir($target, 777);
 }
 
 $target = $target . basename( $_FILES['photo']['name']); 
 
 $pic=($_FILES['photo']['name']); 
 
 //Writes the information to the database 
 //mysql_query("INSERT INTO `employees` VALUES ('$name', '$email', '$phone', '$pic')") ; 
 $rd->add_photo($target);
 
 
 //Writes the photo to the server 
 if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
 { 
 
 //Tells you if its all ok 
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded"; 
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 } 
 ?> 