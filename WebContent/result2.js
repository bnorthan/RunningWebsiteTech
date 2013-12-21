window.onload=initAll;

function initAll()
{	
	
}

function onclickUtopia(radio)
{
	
	var table = document.getElementById("fullresults");
	
	var odd=true;
	
	for (var i = 1, row; row = table.rows[i]; i++) 
	{
		var club=row.cells[5].innerHTML;//("club");//.innerHTML;
		
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
	
	for (var i = 1, row; row = table.rows[i]; i++) 
	{
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

