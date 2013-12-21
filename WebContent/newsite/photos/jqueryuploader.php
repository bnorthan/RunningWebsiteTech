<?php 
$race=$_GET["race"];
//echo "Upload pictures for $race <br><br>";
?>

<style>
#file {
    display:table-cell;
    background: #000000;
    width: 180px;
    height: 40px;
    color: #FFFF00;
    vertical-align: middle;
    text-align: center;
    font-size: 125%;
    border:2px solid;
	border-radius:25px;
}
</style>

<!--  the upload button -->
<div id="file"><p>Click to upload Pictures...</p></div>
<input id="fileupload" type="file" name="files[]" data-url="3rdParty/jQuery-File-Upload-9.2.1/server2/php/uploadracepics.php?race=<?php echo $race?>" multiple>

<script>
var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
var fileInput = $(':file').wrap(wrapper);

fileInput.change(function(){
    $this = $(this);
    $('#file').text($this.val());
})

$('#file').click(function(){
    fileInput.click();
}).show();
</script>
<!--  the progress bar -->
<div id="progress">
    <div class="bar" style="width: 0%;height: 18px; background: yellow;"></div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="3rdParty/jQuery-File-Upload-9.2.1/js/vendor/jquery.ui.widget.js"></script>
<script src="3rdParty/jQuery-File-Upload-9.2.1/js/jquery.iframe-transport.js"></script>
<script src="3rdParty/jQuery-File-Upload-9.2.1/js/jquery.fileupload.js"></script>
<script>
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo(document.body);
            });
            
            
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .bar').css(
                'width',
                progress + '%'
            );
        },
        stop: function (e, data) {
        	document.location.reload(true);
        }
    });
});

</script>