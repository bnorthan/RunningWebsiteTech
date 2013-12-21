<?php
	include_once "facebook-php-sdk/src/facebook.php";
	$app_id = "616383298417823";
	$app_secret = "8b4e322749acd8d7f9cc876a55f104ee";
//	$app_id = "5465304626";
//	$app_secret = "7cac9ce9a7c0411d2cee35993c7bcb10";
	$facebook = new Facebook(array(
		'appId'  => $app_id,
		'secret' => $app_secret,
	));	
?>
<?php
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  
  $config = array(
    'appId' => $app_id,
    'secret' => $app_secret
  );

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
?>
<html>
  <head></head>
  <body>

  <?php
    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        $user_profile = $facebook->api('/me','GET');
        echo "Name: " . $user_profile['name'];

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl(); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl();
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }

  ?>

  </body>
</html>