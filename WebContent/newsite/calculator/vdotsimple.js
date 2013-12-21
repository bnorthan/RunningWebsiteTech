function calculateVDOT(raceTime)
{
	
	var seconds=calculateSecondsFromString(raceTime);
	
	document.raceInfo.seconds.value=seconds;
	
	var tmp1 = document.raceInfo.racedist.selectedIndex;
	var tmp2 = document.raceInfo.racedist.options[tmp1].innerHTML;
	
	var index=findIndexFromEvent(tmp2);
	
	document.raceInfo.raceIndex.value=index;
	
	console.log("calling!");
	
	var vdot=findVDOTFromEventAndTime(seconds, index);
	
	document.raceInfo.vdot.value=vdot;
	
	var marathonIndex=findIndexFromEvent("Marathon");
	
	findEquivalentTimeFromVDOT(vdot, marathonIndex);
}