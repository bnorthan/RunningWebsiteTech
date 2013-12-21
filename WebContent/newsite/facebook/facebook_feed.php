<?php

function fetchUrl($url){
	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, $url);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	 // You may need to add the line below
	 // curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	 $retData = curl_exec($ch);
	 curl_close($ch);
	 return $retData;
}

$app_id = "5465304626";
$app_secret = "7cac9ce9a7c0411d2cee35993c7bcb10";
 
//retrieve a new Auth token
$authToken = fetchUrl("https://graph.facebook.com/oauth/access_token?type=client_cred&client_id={$app_id}&client_secret={$app_secret}");
// fetch profile feed with the Auth token appended

//header ('Content-type: text/html; charset=utf-8');
$limit = 10;
 
$group_id = '122532785222';
$url1 = 'https://graph.facebook.com/'.$group_id;
$des = json_decode(file_get_contents($url1));
 
 
echo '<pre>';
//print_r($des);
echo '</pre>';


/*$facebook->api('GROUP_ID/feed', 'POST', array(
        'message' => 'Testing...'
    )); */
 
$url2 = "https://graph.facebook.com/$group_id/feed?$authToken";
$data = json_decode(file_get_contents($url2));

echo '<pre>';
//print_r($data);
echo '</pre>';
?>
<style type="text/css">
 .wrapper {
 width:300px;
 border:1px solid #ccc;
 font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
 float:left;
 }
 
 .top {
 margin:5px;
 border-bottom:2px solid #e1e1e1;
 float: left;
 width:290px;
 }
 
 .single {
 margin:5px;
 border-bottom:1px dashed #e1e1e1;
 float:left;
 }
 
 .img {
 float:left;
 width:60px;
 text-align:center;
 margin:5px 5px 5px 0px;
 border-right:1px dashed #e1e1e1;
 }
 
 .text {
 width:220px;
 float:left;
 font-size:10px;
 }
 
 a {
 text-decoration: none;
 color: #3b5998;
 }
 
 .guestbook {
 color: #000000;
 background-color:#FFFFFF;
 }
 
</style>

<div>
 <div>
<!-- <a href='http://www.facebook.com/home.php?sk=group_<?=$group_id?>&ap=1'>
<?=$des->name?></a>
 <div style="width:100%; margin: 5px">
 <?=$des->description?>
 </div>
 </div>
-->
<table border="0" cellspacing="1" cellpadding="5" align="center" width="900" bgcolor="#000000">
    <tr class="guestbook">
      <td width="32%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000000"><b>Name</b></font></td>
      <td width="68%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000000"><b>Comments</b></font></td>
    </tr>

 <?
 $counter = 0;
  
 foreach($data->data as $d) {
 if($counter==$limit)
 break;
 ?>


<!--Start Guestbook Entries -->

<tr class="guestbook">
 <td width="32%" valign="top">
   <table border="0" cellspacing="0" cellpadding="2">
     <tr>
       <td colspan="2" class="font1"><b><?=$d->from->name?></b>&nbsp;&nbsp;<img src="/LandOfUtopia2013/img/male.gif" width="12" height="12"></td>
     </tr>
     <tr>
       <td colspan="2" class="font1">from facebook</td>
     </tr>
     <tr>
       <td colspan="2" class="font2">Location:<br></td>
     </tr>
    </table>
  </td>
  <td width="68%" class="font1" valign="top"> 
    
    <hr size="1"><div align="left">
    <a href="javascript:gb_picture('img-1381152485.jpg',640,428)"><img border="0" alt="<?=$d->from->name?>" src="https://graph.facebook.com/<?=$d->from->id?>/picture"/></a>
 <?=$d->message?>
   </div>
<?
 foreach($d->comments->data as $c) {
?>
<table width="90%" border="0" cellspacing="0" align="center">
    <tr>
  <td>
   <hr size="1"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?=$c->from->name?>:<br>
   <?=$c->message?></font>
  </td>
 </tr>
</table>

<?
}
?>

 </td>
</tr>

 <?
 $counter++;
 }
 ?>
</div>
