﻿<?php 
	include 'dbconnect.php';

	function showMail($userid){
		$r=mysql_query("select * from mail where user = ".$userid);
		echo mysql_error();

		$res = "";

		while ($f=mysql_fetch_array($r)){
			$res .= sprintf("<li data-letterid=%s>", $f[id]);
			$res .= $f[mailText];
			$res .= "<div class='button' onclick='deleteMail(this.parentElement)'> Удалить </div>";
			$res .= "</li>";
		}

		return $res; 
	}

	function deleteMail($mailId){
		$r=mysql_query("delete from mail where id = $mailId");
		echo mysql_error();
	}

	if ($_GET["delete"]){
		deleteMail($_GET["delete"], $_GET["user"]);
	}

	echo showMail($_GET["user"]);
	
?>