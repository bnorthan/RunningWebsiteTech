document.write("<DIV ALIGN=CENTER><CENTER><TABLE border=0 CELLSPACING=5 WIDTH=810>");
document.write("<TR><TD VALIGN='TOP'>"); 
// START OF ROW 1 COLUMN 1
document.write("<TABLE border = 4  bgcolor = '#FFFFD9' CELLSPACING=0 WIDTH=400 style='font-size : 12;'>");
document.write("<TR BGCOLOR='#FFFF9D'>");
document.write("<TD COLSPAN=2 VALIGN=TOP class='subheading'>");
document.write("<B><font size=+1>To calculate your VDOT value</font><BR>1) Select a race distance from the drop-down<BR> 2) Enter your time for that distance<BR> 3) Click the Calculate VDOT button</B>");
document.write("</TD></TR>");
document.write("<TR BGCOLOR='#FFFFD9'><TD VALIGN=TOP>");

document.write("<FORM name='search4it'>");
document.write("<B>Select a race Distance:</B><BR><SELECT NAME='racedist'>");
document.write("<OPTION VALUE=''>Distance</OPTION>");
document.write("<OPTION VALUE=2>1500</OPTION>");
document.write("<OPTION VALUE=3>Mile</OPTION>");
document.write("<OPTION VALUE=4>3km</OPTION>");
document.write("<OPTION VALUE=5>2 mile</OPTION>");
document.write("<OPTION VALUE=6 SELECTED>5km</OPTION>");
document.write("<OPTION VALUE=7>8km</OPTION>");
document.write("<OPTION VALUE=8>5 mile</OPTION>");
document.write("<OPTION VALUE=9>10km</OPTION>");
document.write("<OPTION VALUE=10>15km</OPTION>");
document.write("<OPTION VALUE=11>10 mile</OPTION>");
document.write("<OPTION VALUE=12>20km</OPTION>");
document.write("<OPTION VALUE=13>Half marathon</OPTION>");
document.write("<OPTION VALUE=14>25km</OPTION>");
document.write("<OPTION VALUE=15>30km</OPTION>");
document.write("<OPTION VALUE=16>Marathon</OPTION>");
document.write("</SELECT>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<B>Time for that Distance:</B><BR>[mm:ss or hh:mm:ss - separated by colons]<BR><INPUT type='TEXT' name='racetime' size='15' value='17:43' onFocus='this.select();'>");
document.write("</TD></TR>")
;document.write("<TR BGCOLOR='#FFFFD9'><TD VALIGN=bottom ALIGN='RIGHT'>");
document.write("<input type='button' value='Calculate VDOT' onClick='findit(document.search4it.racetime.value)'> <INPUT TYPE='BUTTON' Value=' + ' onClick='findIntensity (1.0)'>");
document.write("</TD><TD ALIGN='LEFT'>");document.write("<INPUT TYPE='BUTTON' Value=' - ' onClick='findIntensity (-1.0)'> <INPUT TYPE='BUTTON' Value='Clear Form' onClick='clearForms()'>");
document.write("</TD></TR>");document.write("<TR BGCOLOR='#FFFFD9'>");
document.write("<TD COLSPAN=2>");document.write("");
document.write("</TD></TR>");
document.write("<TR bgColor='#FFFF9D'>"); 
document.write("<TD VALIGN=TOP><B>Your VDOT Number for training is:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='VDOT' SIZE='6'></TD>");
document.write("</TR>");
document.write("</FORM>");

document.write("<FORM name='equivalents'>");
document.write("<TR BGCOLOR='#FFFFD9'>");
document.write("<TD COLSPAN=2>");
document.write("<B>Equivalent Race Performances for same VDOT:</B>");
document.write("</TD></TR>");document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>1500m:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq1500m'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>Mile:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eqmile'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>3km:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq3km'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>2 mile:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq2m'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>5km:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq5km'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>8km:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq8km'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>5 mile:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq5m'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>10km:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq10km'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>15km:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq15km'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>10 mile:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq10m'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>20km:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq20km'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>1/2 Marathon:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eqhalf'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>25km:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq25km'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>30km:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eq30km'></TD>");
document.write("</TR>");
document.write("<TR bgColor='#FFFFD9'>");
document.write("<TD VALIGN=TOP><B>Marathon:</B>");
document.write("</TD><TD VALIGN=TOP>");
document.write("<INPUT TYPE='TEXT' NAME='eqmarathon'></TD>");
document.write("</TR>");
document.write("</FORM>");
document.write("</TABLE>");
document.write("</TD><TD VALIGN='TOP'>"); 

// START OF  ROW 1 COLUMN 2
document.write("<FORM name='returnit'>");
document.write("<TABLE border = 4  bgcolor = '#E8E8FF' CELLSPACING=0 WIDTH=400 style='font-size : 12;'>");
document.write("<TR BGCOLOR='#FFFF9D'>");
document.write("<TD COLSPAN=2 VALIGN=TOP class='subheading'>");
document.write("<B><font size=+1>These are your paces for each training zone.<BR> Note:</font></b> Pace is time per distance");
document.write("</TD></TR>");
document.write("<TR BGCOLOR='#FFFFD9'>");
document.write("<TD VALIGN=TOP ALIGN='LEFT'><B>Training Zone:</B></TD>");
document.write("<TD VALIGN=TOP ALIGN='CENTER'><B>Pace</B></TD>");
document.write("</TR>");
document.write("<TR BGCOLOR='#FFFFD9'>");
document.write("<TD VALIGN=TOP ALIGN='LEFT'><B><font size=+3>E </font>Easy Pace</B><BR>HR: 65-79%<BR>Qty: lesser of 25% weekly milage or 150 min</TD>");
document.write("<TD VALIGN=TOP ALIGN='RIGHT'>km: <INPUT TYPE='TEXT' SIZE='12' NAME='epacekm'><BR>mile: <INPUT TYPE='TEXT' SIZE='12' NAME='epacemile'></TD>");
document.write("</TR>");
document.write("<TR BGCOLOR='#FFFFD9'>");
document.write("<TD VALIGN=TOP ALIGN='LEFT'><B><font size=+3>M </font>Marathon Pace</B><BR>HR: 80-90%<BR>Qty: lesser of 90 min or 16 miles</TD>");
document.write("<TD VALIGN=TOP ALIGN='RIGHT'>mile: <INPUT TYPE='TEXT' SIZE='12' NAME='mpacemile'></TD>");
document.write("</TR>");
document.write("<TR BGCOLOR='#FFFFD9'>");
document.write("<TD VALIGN=TOP ALIGN='LEFT'><B><font size=+3>T </font>Threshold Pace</B><BR>HR: 88-92%<BR>Qty: lesser of 10% weekly milage or 60 min<BR></TD>");
document.write("<TD VALIGN=TOP ALIGN='RIGHT' nowrap>400m: <INPUT TYPE='TEXT' SIZE='12' NAME='tpace400'><BR>800m: <INPUT TYPE='TEXT' SIZE='12' NAME='tpace800'><BR>1000m: <INPUT TYPE='TEXT' SIZE='12' NAME='tpacekm'><BR>mile: <INPUT TYPE='TEXT' SIZE='12' NAME='tpacemile'></TD>");
document.write("</TR>");
document.write("<TR BGCOLOR='#FFFFD9'>");
document.write("<TD VALIGN=TOP ALIGN='LEFT'><B><font size=+3>I </font>Interval Pace</B><BR>HR: 98-100%<BR>Qty: 8% weekly milage<BR></TD>");
document.write("<TD VALIGN=TOP ALIGN='RIGHT' nowrap>400m: <INPUT TYPE='TEXT' SIZE='12' NAME='ipace400'> <BR>1000m: <INPUT TYPE='TEXT' SIZE='12' NAME='ipacekm'><BR>1200m: <INPUT TYPE='TEXT' SIZE='12' NAME='ipace1200'><BR>mile: <INPUT TYPE='TEXT' SIZE='12' NAME='ipacemile'></TD>");
document.write("</TR>");
document.write("<TR BGCOLOR='#FFFFD9'>");
document.write("<TD VALIGN=TOP ALIGN='LEFT'><B><font size=+3>R </font>Repetition Pace</B><BR>Qty: 5% weekly milage</TD>");
document.write("<TD VALIGN=TOP ALIGN='RIGHT'>200m: <INPUT TYPE='TEXT' SIZE='12' NAME='rpace200'><BR>400m: <INPUT TYPE='TEXT' SIZE='12' NAME='rpace400'><BR>800m: <INPUT TYPE='TEXT' SIZE='12' NAME='rpace800'></TD>");
document.write("</TR>");
document.write("</TABLE></TD></TR>");
document.write("<TR><TD ALIGN='CENTER' COLSPAN='2'><I>");
document.write("</I></TD></TR>");
document.write("</TABLE></DIV>");
