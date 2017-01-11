var selectedCell = null;

function unselect(){
	selectedCell.firstChild.style.bottom = "0px";
	selectedCell.firstChild.style.right = "0px";
	selectedCell = null;
	hideBlocks();
}

function onCellClick(cell){
	if (selectedCell == cell){
		unselect();
	} else {
		if (selectedCell != null){
			unselect();
		} 
		selectedCell = cell;
		//selectedCell.style.boxShadow = '0 0 10px 2px black';

		selectedCell.firstChild.style.bottom = "20px";
		selectedCell.firstChild.style.right = "20px";

		var bid = selectedCell.getAttribute('data-building');
		if (bid == "0"){
			showBuildListBlock();
			return;
		}
		showBuildingInfo(bid);
	}
}
function clearSelectedCell(){
	showBuildListBlock();
	var Get = "cell="+selectedCell.id+"&building=0";
	selectedCell.setAttribute('data-building', 0);
	refreshField(Get, selectedCell.id);
}

function buildOnSelectedCell(buildingId, buildingPrice){
	var money = parseInt(document.getElementById("money").innerHTML);
	if (buildingPrice > money){
		return;
	}

	selectedCell.setAttribute('data-building', buildingId);
	money -= buildingPrice;
	refreshUserInfo("money="+money);

	showBuildingInfo(buildingId);
	var Get = "cell="+selectedCell.id+"&building="+buildingId;
	refreshField(Get, selectedCell.id);
	refreshBuildList();
}
