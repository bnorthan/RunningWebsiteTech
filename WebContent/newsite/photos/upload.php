<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="3rdParty/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="3rdParty/uploadify/uploadify.css">


<!-- Generic page styles -->
<link rel="stylesheet" href="3rdParty/jQuery-File-Upload-9.2.1/css/style.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="3rdParty/jQuery-File-Upload-9.2.1/css/jquery.fileupload.css">

<?php 
$race=$_GET["race"];
//;echo 'race is: '.$race.'<br>'
?> 
 <h1>Upload Pictures!!</h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>

	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'checkExisting' : '3rdParty/uploadify/check-exists.php',
				'swf'      : '3rdParty/uploadify/uploadify.swf',
				'uploader' : 'photos/add_uploadify.php?race=<?php echo $race?>'
				//'uploader' : '3rdParty/uploadify/uploadify.php'
			});
		});
	</script>
	
    
    