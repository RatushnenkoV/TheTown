function deleteMail(mail){
	var li = $(mail);
	li.animate({ 
		opacity: 0.25,
		left: "-=300px",
	}, 200, function() {
		li.slideUp(200);
	} );
	
	var letterid = mail.getAttribute("data-letterid");
	refreshMail("delete=" + letterid, false);
}