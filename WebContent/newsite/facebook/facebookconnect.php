<?php
	include_once "facebook/facebook-php-sdk/src/facebook.php";
	$app_id = "616383298417823";
	$app_secret = "8b4e322749acd8d7f9cc876a55f104ee";
//	$app_id = "5465304626";
//	$app_secret = "7cac9ce9a7c0411d2cee35993c7bcb10";
	$facebook = new Facebook(array(
		'appId'  => $app_id,
		'secret' => $app_secret,
	));	
?>