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

$race=$_GET["race"];
$root= $_SERVER['DOCUMENT_ROOT'];

require "$root/TU2.0/databaseinfo.php";
require "$root/TU2.0/common/RunningDatabase.php";
require "$root/TU2.0/common/DateTimeUtilities.php";

$pics=$root.'/photos/'.$race.'/';

if ($pics) {
	mkdir($pics, 0777, true);
}

$url='http://www.teamutopia-usa.org/TU2.0/photos/'.$race.'/';

$options = array(
		'upload_dir' => $pics,
		'upload_url' => $url,
		'delete_type' => 'POST',
		'db_host' => $hostname,
		'db_user' => $username,
		'db_pass' => $password,
		'db_name' => $dbname,
		'db_race' => $race
);

// create a custom downloader
class CustomUploadHandler extends UploadHandler {
	
	protected function initialize() {
		
		$this->rd=new RunningDatabase($this->options['db_race'],
				$this->options['db_host'],
				$this->options['db_user'],
				$this->options['db_name'],
				$this->options['db_pass']);
				//$race, $hostname, $username, $dbname, $password);
		
		parent::initialize();
		
	}
	
	protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
			$index = null, $content_range = null) {
		
		$file = parent::handle_file_upload(
				$uploaded_file, $name, $size, $type, $error, $index, $content_range
		);

		if (empty($file->error)) {
			
			$database_target = 'photos/'.$this->options['db_race'].'/'. $file->name;
			$this->rd->add_photo($database_target);
		}
		
		return $file;
	}
}

$upload_handler =  new CustomUploadHandler($options);

///////////////////////////////////////////////////////////////////////////////////////


/*$upload = isset($_FILES['files']) ? $_FILES['files'] : null;

if ($upload && is_array($upload['tmp_name'])) 
{
	// param_name is an array identifier like "files[]",
	// $_FILES is a multi-dimensional array:
	foreach ($upload['tmp_name'] as $index => $value) 
	{
		$filename=$upload['name'][$index];
		$database_target = 'photos/'.$race.'/'. $filename;
		$rd->add_photo($database_target);
	}
}

//$database_target = 'photos/'.$race.'/'. $_FILES['Filedata']['name'];
//$rd->add_photo($database_target);


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