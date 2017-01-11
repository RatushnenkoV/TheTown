function getXmlHttp(){
	var xmlhttp;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function setInfo(from, to){
	var req = getXmlHttp()  
	var el = document.getElementById(to) ;
	req.onreadystatechange = function() {  
		if (req.readyState == 4) { 
			el.innerHTML = req.responseText;
			document.getElementById("loading").style.display = "none";
		}
	}
	document.getElementById("loading").style.display = "block";
	req.open('GET', from, true);  
	req.send(null);
}

function refreshInfo(from){
	var req = getXmlHttp();
	req.open('GET', from, true);  
	req.send(null);
}

window.onload=function(){
	startGame();
}

function startGame(){
	refresh();
}

function refresh(){
	refreshMail();
	refreshUserInfo();
	refreshField();
	refreshBuildList();
}

function refreshMail(get="", redraw = true){
	var url = 'php/mail.php?user='+USER_ID+'&'+get;
	if (redraw){
		setInfo(url, 'mailListUl');
	} else {
		refreshInfo(url);
	}
}


function refreshBuildList(){
	var url = 'php/buildList.php?user='+USER_ID;
	setInfo(url,'buildListUl')
}

function refreshField(get="", cell="field"){
	var url = 'php/field.php?user='+USER_ID+'&'+get;
	setInfo(url, cell);
}

function refreshUserInfo(get=""){
	var url = 'php/user.php?user='+USER_ID+'&'+get;
	setInfo(url, 'userInfoUl');
}

function refreshBuildingInfo(get=""){
	var url = 'php/buildingInfo.php'+get;
	setInfo(url, 'infoBlockText');
}