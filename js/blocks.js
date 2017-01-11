function hideBlocks(){
	document.getElementById("infoBlock").style.display = "none";
	document.getElementById("buildListBlock").style.display = "none";
}

function showBuildingInfo(bid){
	hideBlocks();
	document.getElementById("infoBlock").style.display = "block";
	refreshBuildingInfo("?bid="+bid)
}

function showBuildListBlock(){
	hideBlocks();
	document.getElementById("buildListBlock").style.display = "block";
}