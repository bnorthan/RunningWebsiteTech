<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>  
<title>2014 Online Registration Form</title>  
<meta name="GENERATOR" content="Evrsoft First Page" />  
<meta content="text/html; charset=us-ascii" http-equiv="Content-Type" /></head><body>  

<form method="post" action="sendeail.php">    <!-- DO NOT change ANY of the php sections -->
<?php                                
$ipi = getenv("REMOTE_ADDR");                                
$httprefi = getenv ("HTTP_REFERER");                                
$httpagenti = getenv ("HTTP_USER_AGENT");                                
?>

<input name="ip" value="<?php echo $ipi ?>" type="hidden" />
<input name="httpref" value="<?php echo $httprefi ?>" type="hidden" />

<input name="httpagent" value=    "<?php echo $httpagenti ?>" type="hidden" />    
<p align="center"><font size="6">2014 Team Utopia Online Application Form</font></p>    
<p align="center">Team Utopia is a competitive club that is open to all interested individuals. Membership is on an annual basis (January to December). Dues are $25
<br />    a year which include coaching and a racing jersey or other team item. We train together weekly (not a requirement to be a member), represent
<br />    Team Utopia at local and out-of-area team competitions, volunteer at local races throughout the year, and give members an opportunity to socialize
<br />    and meet other runners. We encourage every member to join USA Track and Field (www.usatf.com) to be eligible to join other Team Utopia
<br />    members in USATF team competitions. This form is for the 2014 season.
</p>
<br />    Your Name:<br />    
<input name="visitor" size="35" /><br />
    
Street Address:<br />    
<input name="address" size="35" /><br />    

City, State, &amp; Zip Code (5 Digits):<br />    
<input name="city" />
<input name="state" maxlength="2" size="2" />
<input name="zip" maxlength="5" size="5" /><br />    

Phone Number (xxx-xxx-xxxx):<br />    
<input name="areacode" maxlength="3" size="3" />
<input name="firstthree" maxlength="3" size="3" />
<input name="lastfour" maxlength="4" size="4" /><br />    

Your Email:<br />    
<input name="visitormail" size="35" /><br />    

Birthday (mm/dd/yyyy):<br />    
<input name="bdaymonth" maxlength="2" size="2" />
<input name="bdayday" maxlength="2" size="2" />
<input name="bdayyear" maxlength="4" size="4" /><br />    

USATF Number (Optional):<br />    
<input name="notes" maxlength="10" size="10" /><br />    

Running Goals for 2014 (Mandatory):<br />    
<input style="WIDTH: 1000px; HEIGHT: 50px" name="goals" maxlength="1000" size="1" /><br />    <br />    

Sex: 
<select size="1" name="sex">      
<option selected="selected" value=" Male ">        Male      </option>      
<option value=" Female ">        Female      </option>    </select> 

Team Jersey Size: <select size="1" name="attn">      
<option selected="selected" value=" X-Small ">        X-Small (females only)      </option>      
<option value=" Small ">        Small      </option>      
<option value=" Medium ">        Medium      </option>      
<option value=" Large ">        Large      </option>      
<option value=" X-Large ">        X-Large      </option>      
<option value=" XX-Large ">        XX-Large (males only)      </option>    
</select><br />    <table>      <tbody>        <tr>          <td>            <br />            

<p>Club Membership Application Waiver:</p>            
<p>I know that running is a potentially hazardous activity.&nbsp; 
I assume all risk associated with running and training, including falls, contact with other participants, the effects of
weather,<br />            the conditions of the road and traffic, track and trails, all such risks being known 
and appreciated by me.&nbsp; In consideration of your acceptance of this application to become a<br />   
member of Team Utopia, a) I, for myself and for anyone entitled to act on my behalf, waive, release, and discharge 
Team Utopia, its members, sponsors, officers, representatives<br />            
and coaches from all claims or liabilities of any kind arising out of my participation in or traveling to and from any 
activity organized by Team Utopia or its members, sponsors,<br />            officers, representatives and coaches; 
b) I agree not to sue any of the persons or entities mentioned above for any of the claims or liabilities that 
I have waived; and c) I            indemnify<br />            
and hold harmless the persons or entities mentioned above from any claims made or liabilities assessed against them as a 
result of my actions during any activity organized by Team<br />            Utopia or its members, sponsors, officers, 
representatives and coaches even though that liability may arise out of negligence or carelessness on the part of the 
persons named in this            waiver.</p>          
</td>        </tr>      </tbody>    </table>    <p align="center"><br />    
<?php $todayis = date("l, F j, Y, g:i a")?>Date: <?php echo $todayis ?><br />    
Your Initials: <input name="initials" maxlength="3" size="3" /><br /></p>    
<p align="center"><input value="Submit (Only Click Once)" type="submit" /></p>    
<p align="center">By clicking the "Submit" button, you agree to the terms above. Or, you can return to: 
<a href="http://www.teamutopia-usa.org/TU2.0">Team Utopia's Main Page</a></p>  </form></body></html>