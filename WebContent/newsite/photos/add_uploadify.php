<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

$race=$_GET["race"];

echo 'race is: '.$race.'<br>';

$target = $race;

if (!file_exists($target))
{
	mkdir($target, 0777);
}

// Define a destination
$targetFolder = '/TU2.0/photos/'.$race; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo '1';
		
		///////////////////////////////////////////////////////////////////////////////////////
		include_once "../connect.php";
		
		$database_target = 'photos/'.$race.'/'. $_FILES['Filedata']['name'];
		$rd->add_photo($database_target);
		////////////////////////////////////////////////////////////////////////////////////////
	} else {
		echo 'Invalid file type.';
	}
}



?>