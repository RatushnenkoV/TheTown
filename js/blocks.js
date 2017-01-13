function hideBlocks(){
	hideElement("buildListBlock");
	hideElement("infoBlock");
}

function showBuildingInfo(bid){
	hideElement("buildListBlock");
	showElement("infoBlock");
	refreshBuildingInfo("?bid="+bid)
}

function showBuildListBlock(){
	hideElement("infoBlock");
	showElement("buildListBlock");
}

function hideElement(name){
	var el = document.getElementById(name);
	if (el.style.display == "none"){
		return;
	}

	var d = $(el);
	d.animate({ 
		opacity: 0,
		top: "40px",
	}, 200, function() {
		el.style.display = "none";
		el.style.opacity = 1;
		el.style.top = 0;
	} );
}

function showElement(name){
	var el = document.getElementById(name);
	if (el.style.display == "block"){
		return;
	}

	el.style.display = "block";
	el.style.opacity = 0;
	el.style.top = "-40px";

	var d = $(el);
	d.animate({ 
		opacity: 1,
		top: 0,
	}, 200);
}