<html xmlns="http://www.w3.org/1999/xhtml"><head>  

<title>Information Confirmation</title>  
<meta name="GENERATOR" content="Evrsoft First Page" />  
<meta content="text/html; charset=us-ascii" http-equiv="Content-Type" /></head><body>  
<!-- Reminder: Add the link for the 'next page' (at the bottom) -->  
<!-- This is the 2nd page of the Online form process. contact.php is the first page with fields-->
<!-- USATF Number is "notes" --><!-- Jersey Size is "attn" -->
<?php          
$ip = $_POST['ip'];       
$httpref = $_POST['httpref'];       
$httpagent = $_POST['httpagent'];       
$visitor = $_POST['visitor'];       
$visitormail = $_POST['visitormail'];       
$notes = $_POST['notes'];       
$attn = $_POST['attn'];         
$address = $_POST['address'];      
$city = $_POST['city'];      
$state = $_POST['state'];      
$zip = $_POST['zip'];      
$bdaymonth = $_POST['bdaymonth'];      
$bdayday = $_POST['bdayday'];      
$bdayyear = $_POST['bdayyear'];      
$areacode = $_POST['areacode'];      
$firstthree = $_POST['firstthree'];      
$lastfour = $_POST['lastfour'];      
$sex = $_POST['sex'];	  
$initials = $_POST['initials'];      
$goals = $_POST['goals'];	    
//if (eregi('http:', $notes)) 
if (preg_match('/http:/i', $notes))
{      
	die ("Do NOT try that! ! ");      
}      
if(!$visitormail == "" && (!strstr($visitormail,"@") || !strstr($visitormail,".")))       
{      echo "<h2>Use Back - Enter valid e-mail</h2>\n";       
$badinput = "<h2>Feedback was NOT submitted</h2>\n";      
echo $badinput;      die ("Go back! ! ");      }      
	  	  	      
if(empty($visitor) || empty($visitormail) || empty($address) 
		|| empty($initials) ||empty($city) ||empty($areacode) ||empty($firstthree) 
		||empty($lastfour) ||empty($goals) ||empty($bdaymonth) ||empty($bdayday) 
		||empty($bdayyear) ||empty($goals)||empty($state) ||empty($zip )) 
{      
echo "<h2>Use Back - fill in all fields   <H2></H2>\n"; die ("Use back! ! "); 
} 

$todayis = date("l, F j, Y, g:i a") ;   
$attn = $attn ; $subject = ("New 2014 Team Utopia Member!"); 
$notes =   stripcslashes($notes); 
$message = " $todayis [EST] \n \n   New Team Utopia Member! \n   $visitor ($visitormail)   
$address   $city $state $zip\n   Phone: ($areacode)-$firstthree-$lastfour   Team Jersey Size: 
$sex $attn \n   USATF#: $notes \n   Birthday: $bdaymonth/$bdayday/$bdayyear \n \n \n   
2014 Running Goals: $goals \n \n  Referral : $httpref \n   Additional Info : IP = $ip \n   
Browser Info: $httpagent \n "; 

$from = "From: $visitormail\r\n"; 

mail("bowlej@sage.edu, csliwin@nycap.rr.com, CoachBishop237@gmail.com, plynskey@freihofersrun.com, bnorthan@gmail.com",   $subject, $message, $from); 
?>   

<P align=center>Date: <?php echo $todayis ?><br />  <br />  Thank You, <?php echo $visitor ?>! ( <?php echo $visitormail ?>)
<br />  
<br />  Youre Almost Done!<br />  
<br />  Address: <?php echo $address ?><br />  <?php echo $city?>,<?php echo $state?> <?php echo $zip?><br />  Phone Number: <?php echo $areacode ?>-<?php echo $firstthree ?>-<?php echo $lastfour ?><br />  Team Jersey Size: <?php echo $sex ?> <?php echo $attn ?><br />  Birthday: <?php echo $bdaymonth ?>/<?php echo $bdayday ?>/<?php echo $bdayyear ?><br />  
<br />  Goals: <?php echo $goals ?><br /><br />    USATF#:  <?php $notesout = str_replace("\r", "<br/>", $notes);       

echo $notesout; ?>
</p><br />    <p align="center"><font color="#FF0000" size="5"><em>Just one more step <?php echo $visitor ?>. Simply click on the "Pay Now" button to pay the club dues via PayPal. <br />You don't even need a PayPal account. 
<br />When on our PayPal page, simply click the link that says "Don't have a PayPal account? " and pay as a guest.<br /></em></font></p><!--paypal button should go here--></p>  <p align="center">&nbsp;</p>  <div align="center"><p align="center">&nbsp;  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="LESYVTJ5M6794"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"></form></p></div>  <p align="center"><em><font color="#FF0000" size="5">But first you have to click!</font></em></p></body></html>