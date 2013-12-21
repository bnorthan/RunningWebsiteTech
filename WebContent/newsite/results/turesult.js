window.onload=initAll;

function initAll()
{	
	
}

function onclickUtopia(radio)
{
	
	var table = document.getElementById("fullresults");
	
	var odd=true;
	
	table.rows[0].cells[1].style.display="none";
	
	for (var i = 1, row; row = table.rows[i]; i++) 
	{
		table.rows[i].cells[1].style.display="none";
		
		var club=row.cells[6].innerHTML;//("club");//.innerHTML;
		
		if (club == "utopia-usa")
		{
			row.style.display = "";
			
			if (odd==true)
			{
				row.className='odd';
			}
			else
			{
				row.className='even';
			}
			
			odd=!odd;
		}
		else
		{
			row.style.display = "none";		
		}
		
		
	}
	
	return false;
}

function onclickEveryone(radio)
{
	var table = document.getElementById("fullresults");
	
	var odd=true;
	
	table.rows[0].cells[1].style.display="none";
	
	for (var i = 1, row; row = table.rows[i]; i++) 
	{
		table.rows[i].cells[1].style.display="none";
		
		row.style.display = "";	
		
		if (odd)
		{
			row.className="odd";
		}
		else
		{
			row.className="even";
		}
		
		odd=!odd;
	}
	
	return false;
}

function onclickFriend(radio)
{
	var table = document.getElementById("fullresults");
	
	var odd=true;
	
	table.rows[0].cells[1].style.display="";
	
	for (var i = 1, row; row = table.rows[i]; i++) 
	{
		row.style.display = "";	
		
		row.cells[1].style.display="";
		
		var friend=row.cells[7].innerHTML;
		
		if (friend == "friend")
		{
			row.style.display = "";
		}
		else
		{
			row.style.display = "none";
		}
		
		if (odd)
		{
			row.className="odd";
		}
		else
		{
			row.className="even";
		}
		
		odd=!odd;
	}
	
	return false;
}




