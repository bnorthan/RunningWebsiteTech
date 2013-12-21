<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

$root= $_SERVER['DOCUMENT_ROOT'];
$pics=$root.'/TU2.0/photos/test/';

$url='http://www.teamutopia-usa.org/TU2.0/photos/test/';

//$upload_handler = new UploadHandler();

$upload_handler =  new UploadHandler(array(
		  'upload_dir' => $pics, 'upload_url' => $url));


/*
error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

echo $dir.'<br>';

$root= $_SERVER['DOCUMENT_ROOT'];
$pics=$root.'/TU2.0/photos/test/';

$url='http://www.teamutopia-usa.org/TU2.0/photos/test/';

$fullurl=get_full_url();

echo $url.'<br>';

$upload_handler = new UploadHandler();

//echo '<br><br><br>??????????<br><br><br>';

//$upload_handler =  new UploadHandler(array(
  //  'upload_dir' => $pics, 'upload_url' => $url));
*/